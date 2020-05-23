<?php

class Edit_user{
	public $nama;
	public $pass;
	public $level;
	public $no_telp;
	public $email;
	public $id_user;	
	public $folder;
	public $profile;
	public $tmp;
	 public function Edit_record()	{
		
		if (isset($_POST['simpan'])) {
			include 'koneksi.php';
			$this->nama = $_POST['admin'];
			$this->level = $_POST['level'];
			$this->no_telp=$_POST['no_telepon'];
			$this->email= $_POST['email'];
			$this->id_user = $_POST['id_anggota'];		
			$id= $_POST['id'];
			$this->profile = $_FILES['profile']['name'];
			$this->folder = 'profile/';
			$this->tmp = $_FILES['profile']['tmp_name'];

			if (move_uploaded_file($this->tmp, $this->folder . $this->profile )) {
				$edit_profile = mysqli_query($koneksi,"UPDATE user SET profile='$this->profile' , folder='$this->folder' , admin='$this->nama' ,  email='$this->email' , no_telepon='$this->no_telp' ,id_anggota = '$this->id_user' , level='$this->level' WHERE id='$id'");
				header("location:halaman.php?page=user");
			}else{
				$edit_name = $koneksi->query("UPDATE user SET  admin='$this->nama' ,  email='$this->email' , no_telepon='$this->no_telp' ,id_anggota = '$this->id_user' , level='$this->level' WHERE id='$id'");
				header("location:halaman.php?page=user");
			}
		}
	}
}
$data = new Edit_user();
$data->Edit_record();

?>