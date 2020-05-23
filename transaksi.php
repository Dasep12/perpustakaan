<?php

    class transaksi {

  		public $id ;

        public function bayar(){
        	$koneksi = mysqli_connect("localhost","root","","perpustakaan");
        //input data transaksi peminjaman buku
            $no_transaksi = $_POST['no_transaksi'];
            $tanggal_pinjam = $_POST['tanggal_pinjam'];
            $tanggal_balik = $_POST['tanggal_kembali'];
            $telat = $_POST['lewat_hari'];
            $jml_transaksi = $_POST['total_transaksi'];
            $lama_dipinjam = $_POST['lama_dipinjam'];
            $denda = $_POST['denda'];
            $id_anggota = $_POST['id_anggota'];

         //data buku
            $kode = $_POST['kode_buku'];
            $judul =$_POST['nama_buku'];
            $penulis = $_POST['penulis'];
            $tahun = $_POST['tahun_terbit'];
            $tgl_transaksi = $_POST['tanggal_transaksi'];
            $bayar_sewa  = $_POST['bayar_sewa'];

          //ambil data peminjam
            $nama = $_POST['nama_peminjam'];
            $telepon = $_POST['no_telepon'];
            $email = $_POST['email'];

            $row = "INSERT INTO transaksi(no_transaksi , tanggal_pinjam, tanggal_kembali , lewat_hari , total_transaksi , lama_dipinjam , denda , nama_peminjam , no_telepon , email , kode_buku , nama_buku , penulis , tanggal_transaksi ,bayar_sewa,id_anggota )VALUES('$no_transaksi' , '$tanggal_pinjam' , '$tanggal_balik' , '$telat' ,'$jml_transaksi' ,'$lama_dipinjam' ,'$denda' , '$nama' , '$telepon' , '$email' , '$kode' , '$judul' , '$penulis' ,'$tgl_transaksi','$bayar_sewa','$id_anggota' )";
            $add = mysqli_query($koneksi,$row);
            	if ($add) {
                echo "";
            	}else{
            		echo "Gagal Menambah Data";
            	}
        }

      public function hapus(){
        	$koneksi = mysqli_connect("localhost","root","","perpustakaan");
      		$id = $_POST['id'];
          $no_transaksi = $_POST['no_transaksi'];
      		$row = "DELETE FROM peminjaman_buku WHERE id='$id'";
      		$hapus = mysqli_query($koneksi,$row);
      			if ($hapus) {
                echo "<script>
                        alert('Transaksi $no_transaksi Sudah Selesai');
                        document.location.href='halaman.php?page=pinjam';
                      </script>";
      			}else{
      				echo "Eror 404";
      			}
      }
    }
$pay = new transaksi();
$pay->bayar();
$pay->hapus();
?>