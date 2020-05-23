<?php


class input_Pinjam{

	public function tambah(){
include 'koneksi.php';
	//data peminjam buku
		if (isset($_POST['simpan'])) {
			
	
		$nama = $_POST['nama_peminjam'];
		$telepon = $_POST['no_telepon'];
		$email = $_POST['email'];
		$id_anggota = $_POST['id_anggota'];
		$no = $_POST['no_transaksi'];
		$tgl_balik = $_POST['tanggal_kembali'];
		$tgl_pinjam = $_POST['tanggal_pinjam'];

	//data buku yang di pinjam
		$status= $_POST['status'];
		$kode = $_POST['kode_buku'];
		$judul =$_POST['nama_buku'];
		$tahun = $_POST['tahun_terbit'];
		$penulis = $_POST['penulis'];
		
			if (empty($tgl_pinjam) || empty($tgl_balik)) {
				echo "<script>
					alert('Tanggal Harus Di isi')
				</script>";
			 }elseif(empty($nama)){
				echo "<script>
				alert('Identitas Peminjam Harus Di isi')
				</script>";
			 }elseif(empty($kode)){
				echo "<script>
				alert('Info Buku Harus Di isi')
				</script>";
			 }else{
				$add = "INSERT INTO peminjaman_buku(nama_peminjam, no_telepon,email,no_transaksi,tanggal_pinjam,tanggal_kembali,status,kode_buku,nama_buku,tahun_terbit,penulis,id_anggota)VALUES('$nama','$telepon','$email','$no','$tgl_pinjam','$tgl_balik','$status','$kode','$judul','$tahun','$penulis','$id_anggota')";
				$row = mysqli_query($koneksi,$add);
				echo "<script>
						alert('Peminjaman Dimulai')
						document.location.href='halaman.php?page=tambah';
					</script>";
			 } 	
	}
}
}
?>