<?php
include 'koneksi.php';
$id =$_GET['id'];
$hapus ="DELETE FROM daftar_buku WHERE id='$id'";
$hps = mysqli_query($koneksi,$hapus);
	if ($hps) { ?>
		<script>
			alert('Terhapus')
			document.location.href='index.php?page=daftar';
		</script>
<?php	}
?>