<?php
include "dbconfig.php";

	$nik = $_POST['nomor'];
	$fname = $_POST['tanggal'];
	$lname = $_POST['store'];
	$email = $_POST['alamat'];
	$phno = $_POST['kategori'];
	$position = $_POST['keterangan'];
	
				// Proses simpan ke Database
				$query = "INSERT INTO jobs(nomor, tanggal, store, alamat, kategori, keterangan) VALUES('".$nik."','".$fname."','".$lname."','".$email."','".$phno."','".$position."')";
				$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
				
?>
