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
 <h4>Buku Telah Kembali </h4>
</div>
<div class="list-book">
<?php
$result = mysqli_query($koneksi,"SELECT * FROM daftar_buku ");
$r = mysqli_fetch_array($result);
?>

<table class="table-row" id="example" width="99%">
	<thead>
		<th>No</th>
		<th>No Transaksi</th>
        <th>Kode Buku</th>
        <th>Nama Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Hari Peminjaman</th>
        <th>Telat Pengembalian</th>
        <th>Status</th>

	</thead>

		<tbody>
			<?php 
				$no =1;
				$result = mysqli_query($koneksi,"SELECT * FROM transaksi ");
				while ($r = mysqli_fetch_array($result)) {  ?>
				<tr>
				<td width="5%"><?= $no++; ?></td>
				<td><?= $r['no_transaksi'] ?></td>
                <td><?= $r['kode_buku'] ?></td>
				<td><?= $r['nama_buku'] ?></td>
				<td><?= $r['tanggal_pinjam'] ?></td>
				<td><?= $r['tanggal_kembali'] ?></td>
                <td><?= $r['lama_dipinjam'] ?></td>
                <td><?= $r['lewat_hari'] ?></td>
                <td><?= '<label class="label label-warning">Dikembalikan</label>' ?></td>
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