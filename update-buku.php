<?php
include 'koneksi.php';
	$nama_buku = $_POST['nama_buku'];
	$judul = $_POST['judul_buku'];
	$tahun = $_POST['tahun_terbit'];
	$penulis = $_POST['penulis'];
	$kode = $_POST['kode_buku'];
	$id = $_POST['id'];
	$kategori = $_POST['kategori'];

	$update = mysqli_query($koneksi,"UPDATE daftar_buku SET nama_buku='$nama_buku' , judul_buku='$judul' , tahun_terbit='$tahun' , penulis='$penulis' ,kode_buku='$kode', kategori='$kategori' WHERE id='$id'");
		if ($update) {
			echo "<script>
			alert('Berhasil')
			document.location.href='halaman.php?page=daftar';
			</script>";
		}
?>
