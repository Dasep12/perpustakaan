<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
 <script defer src="fontawesome-free-5.0.2/svg-with-js/js/fontawesome-all.min.js"></script>
 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.0.2/advanced-options/use-with-node-js/fontawesome-free-webfonts/css/fontawesome.css">


<!--Modal Master Buku-->
<script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
</head>
<body onload="waktu()">
<div class="header">
<h2>PerpustakaanQ</h2>
<span>LOGIN AS</span>
<label><a href="halaman.php?page=admin" class="btn btn-default btn-sm"><i class=""></i>
<?php
	session_start();
 	$admin = $_SESSION['admin'];
 	$data = "SELECT * FROM user where admin='$admin'";
 	$row = $koneksi->query($data);
 	$qry = mysqli_fetch_array($row);
 	echo $qry['level'];

 ?>
 </a></label>
</div>

<div class="sidebar">
<img src="img/qw.png" style="width: 98%;margin-left: 3px;height: 32%;margin-top: 1px;"><br>
	<ul>
		
		<li><a href="halaman.php?page=pinjam"><img src="img/234.jpeg">Buku Dipinjam</a></li>
		<li><a href="halaman.php?page=tambah"><img src="img/add-list-xxl.png"> Tambah Peminjaman </a> </li>
		<li><a href="halaman.php?page=kembali"><img src="img/gfg.jpeg"> Riwayat Peminjaman</a></li>
		<li><a href="halaman.php?page=daftar"><img src="img/book_icon.png"> Data Buku</a></li>
		<li><a href="halaman.php?page=user"><img src="img/user12.png">  Data Anggota</a></li>
		<li><a href="halaman.php?page=pay"><img src="img/img.jpg">  Transaksi</a></li>
		<li><a href="logout.php"><img src="img/f06ad4cb9c.png"> Logout</a></li>
	</ul>
</div>

<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
		switch ($page) {
			case 'tambah':
				include 'tambah-buku.php';
				break;
			case 'daftar':
				include 'daftar-buku.php';
				break;
			case 'pinjam':
				include 'buku-dipinjam.php';
				break;
			case 'pay':
				include 'history-transaksi.php';
				break;
			case 'kembali':
				include 'buku-kembali.php';
				break;
			case 'user':
				include 'tambah-user.php';
				break;
			case 'admin':			
				include 'profile.php';
				break;				
			default:
				# code...
				break;
		}
	}

?>
<script type="text/javascript">
$(document).ready(function(){
 $("#sidebar h3").click(function(){
  //slide up all the link lists
  $("#sidebar ul ul ").slideUp();
  //slide down the link list below the h3 clicked - only if its closed
  if(!$(this).next().is(":visible"))
  {
   $(this).next().slideDown();
  }
 })
})
</script>
</script>


<div class="content">


</div>



<div class="footer">
<label>Copyright 2019 @ Perpustaakan</label>
</div>

</body>
</html>