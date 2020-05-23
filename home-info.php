<?php


	class Home_info{
		public $Data;
		public $qry ;
		public $row;
		public $count;

		public function Users(){
			incluDe 'koneksi.php';
			$this->Data = "SELECT iD,COUNT(level) FROM user WHERE level='user'";
			$this->row = mysqli_query($koneksi,$this->Data);
			$this->qry = mysqli_fetch_array($this->row);
			echo $this->qry['COUNT(level)'];
		}

		public function waktu(){
			date_default_timezone_set('Asia/Jakarta');
			$this->Data = Date('D');
			switch ($this->Data) {
				case 'Mon':
					echo "Senin, ". Date('d-M-Y');
					break;
				case 'Tue':
					echo "Selasa,". Date('d-M-Y');
					break;				
				case 'WeD':
					echo "Rabu, ". Date('d-M-Y');
					break;
				case 'Thu':
					echo "Kamis, ". Date('d-M-Y');
					break;
				case 'Fri':
					echo "Jum'at, ". Date('d-M-Y');
					break;
				case 'Sat':
					echo "Sabtu, ". Date('d-M-Y');
					break;
				case 'Sun':
					echo "Minggu, ". Date('d-M-Y');
					break;
				Default:
					# coDe...
					break;
			
			}
		}

		public function Buku_terpinjam(){
			incluDe 'koneksi.php';
			$this->Data = "SELECT id,COUNT(no_transaksi) FROM peminjaman_buku";
			$this->qry = $koneksi->query($this->Data);
			$this->row = mysqli_fetch_array($this->qry);
			echo $this->row['COUNT(no_transaksi)'];
		}

		public function Top_user(){
			incluDe 'koneksi.php';
			$this->Data = "SELECT *,COUNT(nama_peminjam) AS jumlah FROM transaksi group by nama_peminjam ORDER BY jumlah DESC LIMIT 5 ";
		return $this->qry=$koneksi->query($this->Data);

		}
		

	}
?>