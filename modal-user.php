<?php                  
    include "koneksi.php";
    if($_POST['idx']) {
        $no =1;
        $id = $_POST['idx'];      
        $sql = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$id' ");
        while ($r = mysqli_fetch_array($sql)){ ?>
   <form method="POST" enctype="multipart/form-data" action="edit_user.php">
        <input type="hidden" name="id" value="<?=$r['id']; ?>">
        <div class="form-user">
        <label>Nama</label>
        <input type="text" class="form-control" name="admin" value="<?=$r['admin'] ?>">
        <label>Id Anggota</label>
        <input type="text" class="form-control" name="id_anggota" value="<?=$r['id_anggota'] ?>">
        <label>No Telepon</label>
        <input type="text" class="form-control" name="no_telepon" value="<?=$r['no_telepon'] ?>">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?=$r['email'] ?>">
        <label>Level</label>
        <select class="form-control" name="level">
            <option><?=$r['level'] ?></option>
            <option value="Administrator">Administrator</option>
            <option value="User">User</option>
        </select>
        </div>

        <div class="profile-user">
        <img src="profile/<?=$r['profile'] ?>">
        <input type="file" name="profile">
        <input  name="simpan" type="submit" class="btn btn-info" value="Simpan">
        </div>

 <?php } }  ?>

    </form>          
</body>

</html>
