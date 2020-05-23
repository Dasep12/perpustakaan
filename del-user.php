<?php

	class hapus_user{
		public $id;
		public $mysqli;
		public $data ;
		public function Delete_User(){
			include 'koneksi.php';
			$this->id = $_GET['id'];
			$this->data = "DELETE FROM user WHERE id='$this->id'";
			$this->mysqli = $koneksi->query($this->data);
				if ($this->mysqli) {
					header("location:index.php?page=user");
				}else{
					echo "Gagal Hapus";
				}
			}
		}
$data = new hapus_user();
$data->Delete_User();
?>