<?php                  
    include "koneksi.php";
    if($_POST['idx']) {
    	$no =1;
        $id = $_POST['idx'];      
        $sql = mysqli_query($koneksi,"SELECT * FROM daftar_buku WHERE id='$id' ");
        while ($result = mysqli_fetch_array($sql)){ ?>
   <form method="POST" action="update-buku.php">
    <table style="color: #012" width="100%" class="table-condensed" >
     <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    <tr>
		<td width="20%"><span>Nama Buku</span></td>
        <td><input type="text" class="form-control" name="nama_buku" value="<?= $result['nama_buku'];?>"></td>
    </tr>
    <tr>
    <td><span>Kode Buku</span></td>
    <td><input type="text" name="kode_buku"  class="form-control" value="<?= $result['kode_buku']; ?>"></td>
    </tr>
    <tr>
    <td><span>Kategori</span></td>
    <td><input class="form-control" name="kategori" type="text" value="<?= $result['kategori'];?>"></td>
    </tr>
    <tr>
    <td><span>Judul Buku</span></td>
    <td><input type="text" class="form-control" name="judul_buku" value="<?= $result['judul_buku']; ?>"></td>
    </tr>
    <tr>
    <td><span>Tahun Terbit</span></td>
    <td><input class="form-control" type="text" value= "<?= $result['tahun_terbit']; ?>" name="tahun_terbit"></td>
    </tr>
    <tr>
    <td><span>Nama Pengarang</span></td>
    <td><input class="form-control" name="penulis" type="text" value="<?= $result['penulis'];?>"></td>
    </tr>
    <tr>
      <td colspan="3" align="right"><button type="submit"class="btn btn-success">Update</button></td>
        </tr>
 <?php } }  ?>

    </form>
     </table>           
    <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
    </script>


</body>

</html>
