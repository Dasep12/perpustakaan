<?php
	include 'koneksi.php';
$user = @$_POST['admin'];
$pass = @$_POST['pass'];

$data = "SELECT * FROM user WHERE admin='$user' AND pass='$pass'" ;
$login= $koneksi->query($data);
if ($login->num_rows>0) {
	session_start();
	$nama = $_SESSION['admin'] = $user;
	echo "<script type='text/javascript'>
	alert('Selamat Datang $nama')
	document.location.href='halaman.php?page=pinjam';
</script>";
}else{
	echo "<script type='text/javascript'>
	alert('Gagal')
	document.location.href='index.php';
</script>";
}
?>
