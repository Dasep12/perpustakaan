<?php 

	class List_transaksi{

		public $tgl1;
		public $tgl2;
		public $koneksi;
		public function view_Transaksi(){
			
			if (isset($_POST['view'])) {
				$tgl1 = $_POST['tanggal_awal'];
				$tgl2 = $_POST['tanggal_kedua'];
				$array = array($tgl1,$tgl2);
				$koneksi = mysqli_connect("localhost","root","","perpustakaan");
				$result = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE tanggal_transaksi between '$tgl1' AND '$tgl2 '");
				$count = mysqli_num_rows($result);
				if ($count>0) { ?>
				<div style="left:90%;position: absolute;top: 46px;z-index: 9999">
				<form action="export-transaksi.php" method="GET">
				<input type="hidden" name="tgl1" value="<?=$tgl1;?>">
				<input type="hidden" name="tgl2" value="<?=$tgl2;?>">
				<button class="btn btn-primary btn-sm">Export To Excel</button>
				</form>
				</div>

				<div class="info-laporan">
				<table >
					<tr>
					<td><label>Report Penarikan</label></td>
					<td width="5%">:</td>
					<td><?= $tgl1 .' s/d '. $tgl2 ?></td>
					</tr>
					<tr>
					<td><label>User</label></td>
					<td width="5%">:</td>
					<td><?= $_SESSION['admin']?></td>
					</tr>					
				</table>
				</div>
					<table id="example" class="table">
						<thead>
							<th>Nama Buku</th>
							<th>Kode Buku</th>
							<th>Penulis</th>
							<th>Nama Peminjam</th>
							<th>Tanggal Transaksi</th>
							<th>No Transaksi</th>
							<th>Biaya Sewa</th>

						</thead>
						<tbody>
							<?php while ($r = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?=$r['nama_buku'] ?></td>
								<td><?=$r['kode_buku'] ?></td>
								<td><?=$r['penulis'] ?></td>
								<td><?=$r['nama_peminjam'] ?></td>
								<td><?=$r['tanggal_transaksi'] ?></td>
								<td><label class="label label-success"><?=$r['no_transaksi'] ?></label></td>
								<td><?='Rp.' .number_format($r['total_transaksi']) ?></td>
							</tr>
			<?php			} ?>
						</tbody>
					</table>
				</div>
		<?php }else{
		echo "<div style='text-decoration : underline;position:relative;top:150px;left:30%;width:40%;text-aligin:center;'>
				<blink><h1>404 NOT FOUND</h1></blink>
			  </div>";
			}
			}
		}
	}
	$list = new List_transaksi();
	echo $list->view_Transaksi();
?>