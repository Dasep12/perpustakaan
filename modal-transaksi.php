<?php                  
include "koneksi.php";
if($_POST['idx']) {
    $no =1;
    $id = $_POST['idx'];      
    $sql = mysqli_query($koneksi,"SELECT * FROM peminjaman_buku WHERE id='$id' ");
    $harga = 5000;//hari;
    $sekarang = date('Y-m-d');
    $harga_denda = 4000; // hari
// Transaksi 
// Harga sewa * jumlah hari + denda (Jika Lewat Hari)
        while ($r = mysqli_fetch_array($sql)){            
        //Hitung Biaya Transaksi
        $tgl1 = new dateTime($r['tanggal_pinjam']);
        $tgl2 = new dateTime($r['tanggal_kembali']);
        $hari_ini = new dateTime($sekarang);
        /*Selisih Hari       ->*/   $interval = $tgl2->diff($tgl1);
        /*Total Hari Pinjam  ->*/   $jml_hari_sewa= $interval->format('%d') ;
        /*Harga Yang Dibayar ->*/   $bayar = $jml_hari_sewa * $harga;
        /*Selisih Telat hari ->*/   $interval = $hari_ini->diff($tgl2);
        /*Total Hari Terlambat->*/  $jml_hari_telat = $interval->format('%d');
        /*Total Denda */            $bayar_denda = $jml_hari_telat * $harga_denda;
        /*Total Pembayaran All */   $total_transaksi = $bayar_denda + $bayar;
                                    

?>
<form method="POST" action="transaksi.php">
    <div class="pay">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title"><?= 'Nama Buku : ' .$r["nama_buku"]   .' / Kode Buku : '. $r['kode_buku'] ?></h4>
            </div>
        </div>
    <input type="hidden" name="id" value="<?= $r['id']; ?>">
    <input type="hidden" name="id_anggota" value="<?= $r['id_anggota']; ?>">
        <input type="hidden" name="total_transaksi" value="<?= $total_transaksi ?>" >
            <input type="hidden" name="tanggal_transaksi" value="<?= date('Y-m-d'); ?>">
                <input type="hidden" name="nama_buku"  value="<?= $r['nama_buku'];?>">
            <input type="hidden" name="judul_buku" value="<?= $r['judul_buku']; ?>">
        <input type="hidden" name="kode_buku"  value="<?= $r['kode_buku']; ?>">
    <input type="hidden" name="penulis" value="<?= $r['penulis'];?>">
<input type="hidden" name="tahun_terbit" value="<?= $r['tahun_terbit'];?>">
    <span>No Transaksi</span>
        <input type="text" class="form-control" placeholder="No Transaksi" readonly="" value="<?php echo $r['no_transaksi'];?>" name="no_transaksi" readonly="">
            <span>Tanggal Pinjam</span>
        <input type="text" class="form-control" name="tanggal_pinjam" readonly="" value="<?= $r['tanggal_pinjam'] ?>"  placeholder="yy-mm-dd">
    <span>Tanggal Kembali</span>
        <input type="text" class="form-control" name="tanggal_kembali" readonly=""  value="<?= $r['tanggal_kembali'] ?>" placeholder="yy-mm-dd">
            <span>Lama Dipinjam</span>
                <input type="text" readonly="" name="lama_dipinjam" value="<?= $jml_hari_sewa. ' Hari'?>" class="form-control"  >
        <div class="line-harga">
    <span class="biaya">Total Transaksi</span>
<label class="label-info"><?= 'Rp.' .number_format($total_transaksi,2) ?></label>
    </div>
        <div class='total'>
            <span>Telat Pengembalian</span>
                <input type="text" class="form-control" name="lewat_hari" readonly=""  value="<?= $jml_hari_telat.' Hari' ?>" placeholder="yy-mm-dd">
            <span>Harga Sewa</span>
        <input type="text" readonly="" name="bayar_sewa" value="<?='Rp.' .number_format($bayar,2); ?>" class="form-control" >
    <span>Denda</span>
        <input type="text" readonly="" value="<?= 'RP. '. number_format($bayar_denda,2); ?>" name="denda" class="form-control"  >
            </div>
                </div>


<div class="pay2">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">Data Peminjam</h4>
                </div>
                    </div>
                <span>Nama Peminjam</span>
            <input type="text" class="form-control" value="<?= $r['nama_peminjam'] ?>" readonly="" placeholder="nama lengkap" name="nama_peminjam">
        <span>No Telepon</span>
    <input type="text" class="form-control" value="<?= $r['no_telepon'] ?>" readonly="" placeholder="no hp / telepon" name="no_telepon">
        <span>Email</span>
            <input type="email" class="form-control" value="<?= $r['email'] ?>"  readonly="" placeholder="isi alamat email" name="email">
                    <a href="transaksi.php?id=<?=$r['id']; ?>"><button type="submit" class="btn btn-success">Simpan</button></a>
                </div>
            </div>
        </form>
<?php } 
    }  ?>
        </body>
<script>
    function buka(){
        window.open('struk-transaksi.php',resizeable='yes','width=600px','height=500px');

    }
</script>
                </html>
