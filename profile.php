<div class="sub-list-book">
    <h4 >Administrator </h4>
        </div>
            <div class="list-book">
                <div class="list-transaksi">
                    <div class="box-add">
                <?php 
                include 'koneksi.php';
                $nama =$_SESSION['admin'];
                $data = "SELECT * FROM user WHERE admin='$nama' LIMIT 1";
                $row = $koneksi->query($data);
                while ($r = mysqli_fetch_array($row)) { ?>
                <form enctype="multipart/form-data" action="" method="POST">

            <label>Username</label> <input type="text" style="width:50%" value=<?=$r['admin'] ?>  class="box-input" placeholder="Entri Name" name="admin" >
         <label>NIK</label><input type="text" name="id_anggota" style="width:50%"  class="box-input" value=<?=$r['id_anggota'] ?> placeholder="Entri NIK" name="nik" >
    <label>Password</label><input type="password" name="pass" style="width:50%"  class="box-input" placeholder="Entri Password" name="aktiva" >
    <input type="hidden" name="id" value=<?=$r['id']; ?>>
    <input type="hidden" name="pass1" value=<?= $r['pass']?>>
        <label>Group</label>
            <select class="box-input" name="level" style="width:50%" name="level">
                <option><?=$r['level']?></option>
                    </select><br>
                        <div class="icon-profile">
                            <img id="gambar_nodin" src="profile/<?=$r['profile'] ?>">
                        <input type="file"  id="preview_gambar"  name="profile" class="">
                    </div>
                 <div class="tambah" style="background: #fff;"><button type="submit" class="btn btn-primary btn-sm" value="Simpan" name="edit" style="position: relative;left: 194px;top:-200px;width:50%;">Simpan <a class="fa fa-refresh"></a></button>
            </div>
        </form>
 <script type="text/javascript" src="js/jquery.js"></script>       
<script>
    function bacaGambar(input){
        if(input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e){
                $('#gambar_nodin').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function(){
        bacaGambar(this);
    })
</script>
      <?php  }
    ?>
        <?php
            include 'edit-administrator.php';
            $data = new Admin();
            $data->edit_admin();
                ?>
                    </div>
                        </div>
                            </div>