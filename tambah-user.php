     <!-- TABLE STYLES-->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <!--Pagination -->

    <!--Untuk menampilkan modal -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

<!--Icon-->
 <script defer src="fontawesome-free-5.0.2/svg-with-js/js/fontawesome-all.min.js"></script>
 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.0.2/advanced-options/use-with-node-js/fontawesome-free-webfonts/css/fontawesome.css">
    
    <!--Pagination -->

<div class="sub-list-book">
 <h4>Daftar Anggota <i class="fa fa-users"></i> </h4>
</div>
<div class="list-book">
<?php
$result = mysqli_query($koneksi,"SELECT * FROM daftar_buku ");
$r = mysqli_fetch_array($result);
?>
<a href='#add_modal' data-id=<?=$r['id']?> data-toggle='modal' class="btn btn-danger">Tambah Anggota <i class="fa fa-user-plus "></i></a>
<table class="table-row" id="example" width="99%">
	<thead>
		<th>No</th>
		<th>Nama</th>
		<th>ID Anggota</th>
		<th>Level</th>
		<th>No Telepon</th>
		<th>Profile</th>
		<th>Aksi</th>
	</thead>

		<tbody>
			<?php 
				$no =1;
				$result = mysqli_query($koneksi,"SELECT * FROM user WHERE level='user' ");
				while ($r = mysqli_fetch_array($result)) {  ?>
				<tr>
				<td width="5%"><?= $no++; ?></td>
				<td><?= $r['admin'] ?></td>
				<td><?= $r['id_anggota'] ?></td>
				<td><?= $r['level'] ?></td>
				<td><?= $r['no_telepon']?></td>
				<td><img src="profile/<?=$r['profile']; ?>" height='20px' width='30px'></td>
				<td><a href='#edit_modal'  style='padding:2px;align-items:center; width:50px;' data-id=<?=$r['id']?>; data-toggle='modal'><i class="fa fa-edit"></i></a>  /  <a onclick="return confirm('Hapus')" href="del-user.php?id=<?=$r['id']; ?>"><i class="fa fa-trash" style="color: rgba(250,50,60,0.8);"> </i></a></td>
				</tr>
			<?php	}
			?>
		</tbody>
</table>
    <script>
            $(document).ready(function () {
                $('#example').dataTable();
            });
    </script>


<!--MasterBuku Modal-->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal-user.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</div>
    <div class="modal fade"  id="edit_modal" role="dialog">
        <div class="modal-dialog" style="width: 800px" role="document">
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Profile Anggota</h4>
                </div>
                <div class="modal-body-1">
                    <div class="hasil-data"></div>
                </div>
                <div class="modal-footer-1">
                    <button style="position: relative;z-index: 9;" type="button" class="btn btn-info" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
<!--Add New Modal-->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#add_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'add-user.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</div>
    <div class="modal fade" id="add_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Anggota</h4>
                </div>
                <div class="modal-body-1">
                    <div class="hasil-data"></div>
                </div>
                <div class="modal-footer-1">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>