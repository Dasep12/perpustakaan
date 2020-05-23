<?php
	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
	header("content-disposition: attachment;filename=laporan_transaksi".date('dmY').".xls");
?>
<?php
	session_start();
	$tgl1 = $_GET['tgl1'];
	$tgl2 = $_GET['tgl2'];
?>
<br/>
<table >
	<tr>
	<td><label>Report Penarikan</label></td>
	<td width="5%">:</td>
	<td><?= $tgl1 .'	 s/d
	 	'. $tgl2 ?></td>
	</tr>
	<tr>
	<td><label>User</label></td>
	<td width="5%">:</td>
	<td><?=$_SESSION['admin']?></td>
	</tr>					
</table>
<br/><br/><br/>

<center><h1>Laporan Transaki Peminjaman Buku </h1></center>
<table border="1" class="table-border">
	<thead>
		<tr>
			<th>Nama Buku</th>
			<th>Kode Buku</th>
			<th>Penulis</th>
			<th>Nama Peminjam</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Kembali</th>
			<th>Lama Peminjaman</th>
			<th>Lewat Peminjaman</th>
			<th>Tanggal Transaksi</th>
			<th>No Transaksi</th>
			<th>Denda</th>
			<th>Biaya Sewa</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include 'koneksi.php';
		$tgl1 = $_GET['tgl1'];
		$tgl2 = $_GET['tgl2'];
		$data = mysqli_query($koneksi,"SELECT * FROM transaksi where tanggal_transaksi between '$tgl1' AND '$tgl2'");
		$count = mysqli_query($koneksi,"SELECT no_transaksi,SUM('total_transaksi')FROM transaksi where tanggal_transaksi between '$tgl1' AND '$tgl2'");
		$qty = mysqli_fetch_array($count);
		while ($r = mysqli_fetch_array($data)) { ?>
			<tr>
			<td><?= $r['nama_buku'] ?></td>
			<td><?= $r['kode_buku'] ?></td>
			<td><?= $r['penulis'] ?></td>
			<td><?= $r['nama_peminjam'] ?></td>
			<td><?= $r['tanggal_pinjam'] ?></td>
			<td><?= $r['tanggal_kembali'] ?></td>
			<td><?= $r['lama_dipinjam'] ?></td>
			<td><?= $r['lewat_hari'] ?></td>
			<td><?= $r['tanggal_transaksi'] ?></td>
			<td><?= $r['no_transaksi'] ?></td>
			<td><?= $r['denda'] ?></td>
			<td><?= number_format($r['total_transaksi'],2) ?></td>
			</tr>

	<?php	}

		?>
			<td colspan="11"><center>Grand Total Transaksi</center></td>
			<td>
		<?php
			include 'koneksi.php';
			$query = "SELECT id,SUM(total_transaksi) FROM transaksi where tanggal_transaksi between '$tgl1' AND '$tgl2' ";
			$qry = mysqli_query($koneksi,$query);
			$row = mysqli_fetch_array($qry);
			echo number_format($row['SUM(total_transaksi)'],2);
			echo "</br>";	

		?>
			</td>
	</tbody>
</table>