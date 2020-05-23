
   <?php
   	include 'koneksi.php';
   ?>
    <form action="upload-buku.php" method="POST">
    <table style="color: #012" width="100%" class="table-condensed" >
    <tr>
		<td width="20%"><span>Nama Buku</span></td>
        <td><input type="text" name="nama_buku" class="form-control" placeholder="Judul/Nama Buku"></td>
    </tr>
    <tr>
    <td><span>Kode Buku</span></td>
    <td><input type="text" name="kode_buku"  class="form-control" placeholder="Kode Buku" ></td>
    </tr>
    <tr>
    <td><span>Judul Buku</span></td>
    <td><input type="text" name="judul_buku" class="form-control" placeholder="Judul" ></td>
    </tr>
    <tr>
    <td><span>Tahun Terbit</span></td>
    <td><input placeholder="yy-mm-dd" name="tahun_terbit" class="form-control" type="text" ></td>
    </tr>
    <tr>
    <td><span>Nama Pengarang</span></td>
    <td><input class="form-control" placeholder="Pengarang" type="text" name="penulis"></td>
    </tr>
    <tr>
    <td><span>Kategori</span></td>
    <td><input class="form-control" placeholder="Pengarang" type="text" name="kategori"></td>
    </tr>
    <tr>
      <td colspan="3" align="right"><button name="simpan" type="submit" class="btn btn-success">Tambah Baru <i class="fa fa-plus"></i></button></td>
        </tr>
    </form>
