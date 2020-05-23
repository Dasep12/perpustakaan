     <!-- TABLE STYLES-->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" />
    <!--Pagination -->

    <!--Untuk menampilkan modal -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.bootstrap.js"></script>

    <!--Pagination -->

<div class="sub-list-book">
 <h4>Daftar Master Buku </h4>
</div>
<div class="list-book">
<?php
$result = mysqli_query($koneksi,"SELECT * FROM transaksi ");
$r = mysqli_fetch_array($result);
?>
<a href='#add_modal' data-id=<?=$r['id']?> data-toggle='modal' class="btn btn-danger">Add New Book <i class="fa fa-plus "></i></a>
<a href='#upload_modal' data-id=<?=$r['id']?> data-toggle='modal' class="btn btn-success">Upload XLS <i class="fa fa-file-excel "></i></a>
<table class="table-row" id="example" width="99%">
	<thead>
		<th>No</th>
		<th>Kode Buku</th>
		<th>Nama Buku</th>
        <th>Kategori</th>
		<th>Judul Buku</th>
		<th>Tahun Terbit</th>
		<th>Nama Pengarang</th>
		<th>Aksi</th>
	</thead>

		<tbody>
			<?php 
				$no =1;
				$result = mysqli_query($koneksi,"SELECT * FROM daftar_buku ");
				while ($r = mysqli_fetch_array($result)) {  ?>
				<tr>
				<td width="5%"><?= $no++; ?></td>
				<td><?= $r['kode_buku'] ?></td>
				<td><?= $r['nama_buku'] ?></td>
				<td><?= $r['kategori'] ?></td>
                <td><?= $r['judul_buku'] ?></td>
				<td><?= $r['tahun_terbit'] ?></td>
				<td><?= $r['penulis'] ?></td>
				<td><a href='#edit_modal'  style='padding:2px;align-items:center; width:50px;' data-id=<?=$r['id']?>; data-toggle='modal'><i class="fa fa-edit"></i></a>  /  <a onclick="return confirm('Hapus')" href="del-book.php?id=<?=$r['id']; ?>"><i class="fa fa-trash" style="color: rgba(250,50,60,0.8);"> </i></a></td>
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


<!--Block MasterBuku Modal-->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal-master-buku.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</div>
<!--Modal edit Buku -->
    <div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Rincian Buku</h4>
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
<!--Block-->

<!--Add New Modal-->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#add_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'add-book.php',
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
                    <h4 class="modal-title">Tambah Buku Baru</h4>
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



<!--Modal Upload Data Buku Baru-->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#upload_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal-upload.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</div>
    <div class="modal fade" id="upload_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content-1">
                <div class="modal-header-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Buku Baru</h4>
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