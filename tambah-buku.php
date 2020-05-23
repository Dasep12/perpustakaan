     <!-- TABLE STYLES-->
<link rel="stylesheet" type="text/css" href="css/bootstrap-modal.css">
<link rel="stylesheet" type="text/css" href="datatables/dataTables.bootstrap.css">
    <!--Pagination -->

    <!--Untuk menampilkan modal -->

    <!--Kalender -->
<link rel="stylesheet" type="text/css" href="calender/jquery-ui.css">
<script type="text/javascript" src="calender/jquery-ui.js"></script>
<script type="text/javascript" src="calender/jquery.js"></script>
<script type="text/javascript" src="calender/jquery-ui.min.js"></script>
<div class="sub-input-book">
<h4>Form Peminjaman Buku</h4>
</div>

<div class="input-book">
    <div class="transaksi">
        <span>No Transaki</span>
            <form action=""  method="POST">
            <input type="hidden" name="status" value="Dipinjamkan">
                <input type="text" class="form-control" placeholder="No Transaksi" value="<?= 'TRS'.date('sih').'DSP'; ?>" name="no_transaksi" readonly="">
                    <span>Tanggal Pinjam</span>
                        <input type="text" class="form-control" name="tanggal_pinjam" id="datepicker1" placeholder="yy-mm-dd">
                            <span>Tanggal Kembali</span>
                                <input type="text" class="form-control" name="tanggal_kembali" id="datepicker" placeholder="yy-mm-dd">
                            <script>
                                $("#datepicker").datepicker({
                                    dateFormat : 'yy-mm-dd'
                                 });
                                $("#datepicker1").datepicker({
                                    dateFormat : 'yy-mm-dd'
                                });
                            </script>
                            <div class="transaksi2">
                         <span>Nama Peminjam</span>
                     <input type="text" class="form-control" readonly="" id="nama_peminjam" placeholder="nama lengkap" name="nama_peminjam">
                     <button type="button" style="width: 3%;height: 34px;padding: 3px 4px;position: absolute;left: 42.6%;top: 20px;;z-index: -9;"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2"><b><i style="font-size: 20px;" class="fa fa-search"></i></b></button>
                    <span>No Telepon</span>
                <input type="text" class="form-control" readonly="" id="no_telepon" placeholder="no hp / telepon" name="no_telepon">
                    <span>Email</span>
                        <input type="email" class="form-control" readonly="" id="email" placeholder="isi alamat email" name="email">
                        <span>ID User</span>
                            <input type="text" placeholder="ID Anggota" readonly="" class="form-control" id="id_anggota" name="id_anggota">

                            </div>

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Data Buku</h4>
                                            </div>
                                                </div>

                                           <div class="detail-buku">
                                        <div>
                                    <label>Nama Buku</label>
                             <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Nama Buku" readonly="" />
                        </div>

                    <div>
                 <label>Kode Buku</label>
            <input type="text" class="form-control" name="kode_buku" id="kode_buku" placeholder="Kode Buku" readonly="" />
            </div>

                <div>
                     <label>Tahun Buku</label>
                         <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="Nama Buku" readonly="" />
                            </div>

                            <div>
                                <label>Penulis</label>
                                    <input type="text" class="form-control" name="penulis" readonly="" id="penulis" placeholder="Penulis" required/>
                                        </div>

                                        <div class="panel panel-success">
                                     <div class="panel-heading ">
                                 <button type="submit" class="btn btn-danger" value="Simpan" name="simpan">Simpan <i class="fa fa-check"></i></button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><b>Cari Buku <i class="fa fa-search"></i></b></button>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php
include 'upload-pinjam.php';
$data = new input_Pinjam();
$data->tambah();
 ?>
<!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog" style="width:800px">
                     <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" id="btn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">Daftar Buku</h4>
                             </div>
                        <div class="modal-body">
                 <table id="lookup" class="table">
                    <thead>
                   <tr>
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Nama Buku</th>
                        <th>Tahun Terbit</th>
                        <th>Nama Pengarang</th>
                    </tr>
                 </thead>
             <tbody>
        <?php
                //Data mentah yang ditampilkan ke tabel 
            $query = mysqli_query($koneksi,'SELECT * FROM daftar_buku');
                $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr class="pilih" data-kode="<?php echo $data['kode_buku']; ?>" data-nama="<?php echo $data['nama_buku']; ?>" data-penulis="<?php echo $data['penulis']; ?>" data-tahun="<?php echo $data['tahun_terbit']; ?>">
                        <td><?= $no++; ?></td>
                        <td><?php echo $data['kode_buku']; ?></td>
                        <td><?php echo $data['nama_buku']; ?></td>
                        <td><?php echo $data['tahun_terbit']; ?></td>
                        <td><?php echo $data['penulis']; ?></td>
                    </tr>
                <?php
            }
        ?>
        </tbody>
    </table>  
        </div>
            </div>
                </div>
                    </div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="datatables/jquery.dataTables.js"></script>
<script src="datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
//            jika dipilih, nim akan masuk ke input dan modal di tutup
        $(document).on('click', '.pilih', function (e) {
            document.getElementById("nama_buku").value = $(this).attr('data-nama');
            document.getElementById("penulis").value = $(this).attr('data-penulis');
            document.getElementById("tahun_terbit").value = $(this).attr('data-tahun');
            document.getElementById("kode_buku").value = $(this).attr('data-kode');
        $('#myModal').modal('hide');
        });


        //tabel lookup mahasiswa
        $(function () {
        $("#lookup").dataTable();
        });

</script>
    </div>  
        </div>

<!-- Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog" style="width:800px">
                     <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" id="btn" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                   <h4 class="modal-title" id="myModalLabel">Daftar Anggota</h4>
                             </div>
                        <div class="modal-body">
                 <table id="lookup2" class="table">
                    <thead>
                   <tr>
                        <th>No</th>
                        <th>Id Anggota</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                    </tr>
                 </thead>
             <tbody>
        <?php
                //Data mentah yang ditampilkan ke tabel 
            $query = mysqli_query($koneksi,'SELECT * FROM user');
                $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr class="pilih2" data-idUser="<?php echo $data['id_anggota']; ?>"  data-nama="<?php echo $data['admin']; ?>" data-email="<?php echo $data['email']; ?>" data-telepon="<?php echo $data['no_telepon']; ?>">
                        <td><?= $no++; ?></td>
                        <td><?php echo $data['id_anggota']; ?></td>
                        <td><?php echo $data['admin']; ?></td>
                        <td><?php echo $data['no_telepon']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                <?php
            }
        ?>
        </tbody>
    </table>  
        </div>
            </div>
                </div>
                    </div>


<script type="text/javascript">
//            jika dipilih, nim akan masuk ke input dan modal di tutup
        $(document).on('click', '.pilih2', function (e) {
            document.getElementById("nama_peminjam").value = $(this).attr('data-nama');
            document.getElementById("no_telepon").value = $(this).attr('data-telepon');
            document.getElementById("email").value = $(this).attr('data-email');
            document.getElementById("id_anggota").value = $(this).attr('data-idUser');
        $('#myModal2').modal('hide');
        });


        //tabel lookup mahasiswa
        $(function () {
        $("#lookup2").dataTable();
        });

</script>
    </div>  
        </div>
    <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
    </script>
</div>