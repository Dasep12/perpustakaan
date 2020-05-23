<?php
	
	include"koneksi.php";
	include"PHPExcel.php";

    $random = "file_upload_".rand(11111,99999);
    $target_file = $random.basename($_FILES["file_excel"]["name"]);
    $uploadOk = 1;

    if (move_uploaded_file($_FILES["file_excel"]["tmp_name"], $target_file)) {

        ini_set('memory_limit', '-1');
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');

        $inputFileType = 'Excel2007';
        $sheetIndex = 0;
        $inputFileName = $target_file;

        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $sheetnames = $objReader->listWorksheetNames($inputFileName);
        $objReader->setLoadSheetsOnly($sheetnames[$sheetIndex]);
        
        try {
        $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);

        //baca untuk setiap baris excel
        for ($i=1; $i <= $numRows ; $i++) {
            $sql = "INSERT INTO daftar_buku (nama_buku,kode_buku,judul_buku,tahun_terbit,penulis,kategori)
            VALUES ('".$worksheet[$i]['A']."','".$worksheet[$i]['B']."','".$worksheet[$i]['C']."','".$worksheet[$i]['D']."','".$worksheet[$i]['E']."','".$worksheet[$i]['F']."')";

            if (mysqli_query($koneksi, $sql)) {
                $pesan= "Sukses Simpan Data!";

            } else {
                $pesan= "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }

        }

         unlink($target_file);
         echo"<script>
            alert('Berhasil')
            document.location.href='halaman.php?page=daftar';
         </script>";
    } else {
        $pesan="Sorry, there was an error uploading your file.";
        echo json_encode(array('st'=>0,'pesan'=>$pesan));
    }


?>