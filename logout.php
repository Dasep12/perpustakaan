<?php
session_start();
$nama = $_SESSION['admin'];

session_destroy();
echo "
<script>
	alert('Selamat Tinggal $nama')
	document.location.href='index.php';
</script>";
?>