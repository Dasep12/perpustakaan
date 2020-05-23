
   <?php
   	include 'koneksi.php';
   ?>
    <form enctype="multipart/form-data" action="upload-user.php" method="POST">
   
    <table style="color: #012" width="100%" class="table-condensed" >
    <tr>
		<td width="20%"><span>Nama Anggota</span></td>
        <td><input type="text" name="admin" class="form-control" ></td>
    </tr>
    <tr>
    <td><span>ID Anggota</span></td>
    <td><input type="text" name="id_anggota"  class="form-control" ></td>
    </tr>
    <tr>
    <td><span>No Telepon</span></td>
    <td><input type="text" name="no_telepon" class="form-control"></td>
    </tr>
    <tr>
    <td><span>Email</span></td>
    <td><input name="email" class="form-control" type="text" ></td>
    </tr>
    <tr>
    <td><span>Level</span></td>
    <td><select class="form-control" name="level">
        <option>Administrator</option>
        <option>User</option>
    </select></td>
    </tr>
    <tr>
    <td><span>Password</span></td>
    <td><input class="form-control" name="pass" type="text" ></td>
    </tr>
    <tr>
    <td><span>Profile</span></td>
    <td><input  name="profile" type="file" ></td>
    </tr>    
    <tr>
      <td colspan="3" align="right"><button name="simpan" type="submit" class="btn btn-success">Tambah Baru <i class="fa fa-plus"></i></button></td>
        </tr>
    </form>
