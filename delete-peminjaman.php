<?php

	class hapus_Buku_Terpinjam {
		public $id;

			public function hapus_data(){
				include 'koneksi.php';
				$this->id=$_GET['id'];
				$row = "DELETE FROM peminjaman_buku WHERE id='$this->id'";
				$sql= mysqli_query($koneksi,$row);
					if ($sql) {
						echo "<script>
								alert('Hapus Berhasil')
								document.location.href='halaman.php?page=pinjam';
							</script>";
					}else{
						echo "<script>
								alert('Peminjaman Dibatalkan')
								document.location.href='halaman.php?page=pinjam';
							</script>";
					}
			}
	}
$data= new hapus_Buku_Terpinjam();
echo $data->hapus_data();
?>
