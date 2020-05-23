    <?php
    include 'koneksi.php';
    	if (isset($_POST['simpan'])) {
    		$nama = $_POST['nama_buku'];
    		$judul = $_POST['judul_buku'];
    		$penulis = $_POST['penulis'];
    		$kategori = $_POST['kategori'];
    		$tahun =$_POST['tahun_terbit'];
    		$kode = $_POST['kode_buku'];

    		$add = mysqli_query($koneksi,"INSERT INTO daftar_buku (nama_buku , judul_buku , penulis , kategori , tahun_terbit , kode_buku)VALUES('$nama' , '$judul' , '$penulis' , '$kategori' ,'$tahun' , '$kode')");
    		
    		if ($add) {
			echo "<script>
			alert('Berhasil')
			document.location.href='halaman.php?page=daftar';
			</script>
			";
    		}
}
?>