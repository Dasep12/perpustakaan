<?php

	class Admin{
		public $host;
		public $name;
		public $pass;
		public $db;
		public $koneksi;
		public $id ;

		public function __construct(){
			$this->host = "localhost";
			$this->pass = "";
			$this->db = "perpustakaan";
			$this->name = "root";
			$this->koneksi = mysqli_connect($this->host,$this->name,$this->pass,$this->db);

			if (!$this->koneksi) {
				echo "Koneksi Gagal";
			}
		}


		public function edit_admin(){
			if (isset($_POST['edit'])) {
				$password = $_POST['pass'];
				$password1 = $_POST['pass1'];
				$this->id = $_POST['id'];
				$folder = 'profile/';
				$poto = $_FILES['profile']['name'];
				$tmp = $_FILES['profile']['tmp_name'];
				$ekstensi = array('png','jpeg','jpg');
				$explode = explode('.', $poto);
				$ekstensi2 = $explode[count($explode)-1];
		if ($password == $password1 ) {
			if(!in_array($ekstensi2, $ekstensi)){
				echo"<script>alert('File Tidak Di ijinkan')</script>";
			}
			elseif(move_uploaded_file($tmp, $folder . $poto)) {
				$data = "UPDATE user set profile='$poto' WHERE id='$this->id'";
				$row = mysqli_query($this->koneksi,$data);
				if ($row) {
					echo"<script>alert('Berhasil')</script>";
				}
			}
		}else{
			echo"<script>alert('Gagal')</script>";
			}
				}
					}
						}
?>
