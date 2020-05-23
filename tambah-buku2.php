<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
 <script defer src="fontawesome-free-5.0.2/svg-with-js/js/fontawesome-all.min.js"></script>
 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.0.2/advanced-options/use-with-node-js/fontawesome-free-webfonts/css/fontawesome.css">

<!--Calender-->
<link rel="stylesheet" type="text/css" href="js/jquery.datetimepicker.min.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>
<!--Modal Master Buku-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>


<div class="input-book">
	<div class="sub-input-book">
	<h4>Entri Peminjaman Buku</h4>
	</div>

<form action="" name="datetimepicker" method="POST">
<?php
$id = $_GET['id'];
include 'koneksi.php';
	$result = mysqli_query($koneksi,"SELECT * FROM daftar_buku WHERE id='$id' ");
	while ($r = mysqli_fetch_array($result)) { ?>
        
<label>Kode Buku</label>
<input type="text" class="form-control" value="<?=$r['kode_buku'] ?>" >
<label>Nama Buku</label><input type="text" name="nama_buku" placeholder="Entri Nama Buku" class="form-control" value="<?= $r['nama_buku']?>">

<label>Karangan</label><input type="text" name="nama_pengarang" placeholder="Pengarang Buku" class="form-control" value="<?= $r['nama_pengarang']; ?>">

<label>Tahun Terbit</label><input type="text" name="tahun_terbit"  placeholder="YYYY-MM-DD" id="datetime" class="form-control">



<label>Nama Peminjam</label><input type="text" name="nama_peminjam" placeholder="Peminjam Buku" class="form-control">


<label>Tanggal Pinjam</label><input type="text" name="tanggal_pinjam" placeholder="YYYY-MM-DD" class="form-control">


<label>Tanggal Kembali</label><input type="text" name="tanggal_kembali" placeholder="YYYY-MM-DD" class="form-control">
<label>No Telepon</label><input type="text" maxlength="15" name="nama_buku" placeholder="No HP / Telp" class="form-control">

<label>Email</label><input type="email" name="nama_buku" placeholder="Gmail / Yahho " class="form-control">


<input type="submit" name="simpan" class="btn btn-primary" value="Pinjamkan">

</form>

<?php }
 ?>
<div class="sub-input-footer">

</div>
</div>
        <script>
        $("#datetime").datetimepicker();
        </script>

