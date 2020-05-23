<?php

	class Add_user{
		public $nama;
		public $pass;
		public $level;
		public $no_telp;
		public $email;
		public $id_user;
		public $profile;
		public $folder;
		public $max_size;
		public $ekstensi ;
		public $size;
		public $tmp;

		public function save_user(){
			$koneksi = mysqli_connect("localhost","root","","perpustakaan");

			if (isset($_POST['simpan'])) {
				$this->nama = $_POST['admin'];
				$this->level = $_POST['level'];
				$this->no_telp=$_POST['no_telepon'];
				$this->email= $_POST['email'];
				$this->id_user = $_POST['id_anggota'];
				$this->pass= $_POST['pass'];

				//nama file dan ukuran
				$this->profile = $_FILES['profile']['name'];
				$this->size = $_FILES['profile']['size'];
				$this->tmp = $_FILES['profile']['tmp_name'];
				$this->folder = 'profile/';

				//Cari dan Filter Ekstensi
				$this->ekstensi= array('jpg','png','jpeg');
				$explode = explode('.', $this->profile);
				$diijinkan = $explode[count($explode)-1];
					if (!in_array($diijinkan, $this->ekstensi)) {
						echo "<script>
						alert('File Yang Di upload Salah');
						document.location.href='halaman.php?page=user';
						</script>";
					}else{
						if(move_uploaded_file($this->tmp, $this->folder . $this->profile)) {
						mysqli_query($koneksi,"INSERT INTO user (profile,folder,admin,level,pass,id_anggota,email,no_telepon)VALUES('$this->profile','$this->folder','$this->nama','$this->level','$this->pass','$this->id_user','$this->email','$this->no_telp')");
							echo "<script>
							alert('User $this->nama Ditambahkan');
							document.location.href='halaman.php?page=user';
							</script>";
						}
					}
			}
		}
	}
$data =new Add_user();
$data->save_user();
?>

