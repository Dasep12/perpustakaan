<?php 
include 'home-info.php';
 $data = new Home_info();
 ?>
     <!-- TABLE STYLES-->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-modal.css">

    <!--Pagination -->

    <!--Untuk menampilkan modal -->
<script type="text/javascript">
  // 1 detik = 1000
  windows.setTimeout("waktu()",10000);
  function waktu(){
    var tanggal = new Date();
    setTimeout("waktu()",1000);
    document.getElementById('output').innerHTML =tanggal.getHours()+":" +tanggal.getMinutes()+":"+tanggal.getSeconds();
  }
</script>
    <!--Pagination -->
<div class="head-home">
<span><i style="color:  #337ab7;" class="fa fa-angle-double-left"></i> <label>Dashboard</label></span>

<div class="waktu">
<a id="output"></a> / 
<?php $data->waktu(); ?>
</div>
</div>

<div class="list-book">
<div class="card-user">
<center>
<h1><i class="fa fa-users log"></i></h1>
<h2>
<?php
 $data->Users();
 ?><br>Total Anggota
</h2>
</center>
</div>

<div class="card-book">
<center>
<h1><i class="fa fa-book"></i></h1>
<h2>
<?php
 $data->Buku_terpinjam();
 ?><br>Buku Terpinjam
</h2>
</center>
</div>

<div class="table-user">
<table class="table-striped">
    <thead>
        <tr>
        <th colspan="6"><center>TOP 5 Siswa Terajin Pinjam Buku</center></th>
        </tr>
        <th>#</th>
        <th>Nama</th>
        <th>Meminjam</th>
        <th>Email</th>
        <th>No Telepon</th>
    </thead>

    <tbody>
    <?php
        $no =1 ;

        foreach ($data->Top_user() as $r ) { ?>
            <tr>
            <td><?= $no++?></td>
            <td><?= $r['nama_peminjam'] ?></td>
            <td><?= $r['jumlah'] .' x';?></td>
            <td><?= $r['email'] ;?></td>
            <td><?= $r['no_telepon']?></td>
            </tr>
       <?php }

    ?>
    </tbody>
</table>
<span><i> * Klik Profile Untuk Melihat Detail Siswa *</i></span>



</div>
</div>