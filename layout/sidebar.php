<div class="sidebar">
<img src="img/qw.png" style="width: 98%;margin-left: 3px;height: 32%;margin-top: 1px;"><br>
	<ul>
		<li><a href=""><img src="img/234.jpeg">Buku Dipinjam</a></li>
		<li><a href="index.php?page=tambah"><img src="img/add-list-xxl.png"> Tambah Peminjaman </a> </li>
		<li><a href=""><img src="img/gfg.jpeg"> Pengembalian</a></li>
		<li><a href="index.php?page=daftar"><img src="img/book_icon.png"> Data Buku</a></li>
		<li><a href=""><img src="img/user12.png">  Data Anggota</a></li>
		<li><a href=""><img src="img/img.jpg">  Transaksi</a></li>
		<li><a href=""><img src="img/f06ad4cb9c.png"> Logout</a></li>
	</ul>
</div>

<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
		switch ($page) {
			case 'tambah':
				include 'tambah-buku.php';
				break;
			case 'daftar':
				include 'daftar-buku.php';
				break;
			default:
				# code...
				break;
		}
	}

?>
