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
	<h4>List Buku Terpinjam </h4>
		</div>
			<div class="list-book">
				<table class="table-row" id="example" width="100%">
					<thead>
						<tr>
							<th rowspan="2">No</th>
							<th colspan="2" >Detail Buku</th>
							<th colspan="2">Detail Peminjamaman</th>
							<th colspan="2">Tanggal & Jam</th>
							<th rowspan="2">Estimasi Hari</th>
							<th rowspan="2" width="10%">Aksi</th>
						</tr>
							<th>Kode Buku</th>
							<th>Nama Buku</th>
							<th>Nama Peminjam</th>
							<th>No Telepon</th>
							<th>Tanggal Pinjam</th>
							<th>Tanggal Kembali</th>
					</thead>
			<tbody>
	<?php 
		include 'koneksi.php';
			$no =1;
				$result = mysqli_query($koneksi,"SELECT * FROM peminjaman_buku ");
					while ($r = mysqli_fetch_array($result)) {  ?>
				<tr>
					<td width="5%"><?= $no++; ?></td>
					<td width="9%">
										<?php
						$tgl1 = new DateTime($r['tanggal_kembali']);
						$tgl2 = new DateTime(date('Y-m-d'));
						if ($tgl1<$tgl2) {
							echo "<label class='label-danger' style='font-weight:normal;border-radius:1px;width:60%;'>".$r['kode_buku']."</label>";
						}else{
							echo "<label style='font-weight:normal;border-radius:1px;width:60%; class='label-default'>". $r['kode_buku']."</label>";
						}

					?>
					</td>
					<td><?= $r['nama_buku']?></td>
					<td><?= $r['nama_peminjam'] ?></td>
					<td><?= $r['no_telepon'] ?></td>
					<td><?= $r['tanggal_pinjam'] ?></td>
					<td><?= $r['tanggal_kembali'] ?></td>
					<td>
						<?php
						$k= $r['tanggal_pinjam'];
						$s = $r['tanggal_kembali'];
						$tgl1 = new DateTime($k);
						$tgl2 = new DateTime($s);
						$interval = $tgl2->diff($tgl1);
						echo $interval->format('%d Hari');
						?>
					</td>
					<td>
					<a title="lihat-detail" href='#edit_modal'  data-id=<?=$r['id']?>; data-toggle='modal'>
						<i style="font-size: 15px;" class="fab fa-twitch"></i> /
					</a>
				<a onclick="return confirm('Yakin Batalkan')" href='delete-peminjaman.php?id=<?=$r['id']; ?>'  title="batalkan-peminjaman" >
				<i style="font-size: 15px;color:red;transform: rotate(45deg);" class="fa fa-plus"></i>
				</a>					 
				</td>
					</tr>
<?php	}
?>
</tbody>
		</table>

<p><i>Note * Jika Kode Buku Sudah Berwarna merah itu menandakan buku telat di kembalikan dan wajib dikenakan denda</i></p>
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
					url : 'modal-transaksi.php',
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
	<div class="modal-dialog" style="width: 1000px;" role="document">
		<div class="modal-content-1">
			<div class="modal-header-1">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Transaksi Pengembalian</h4>
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