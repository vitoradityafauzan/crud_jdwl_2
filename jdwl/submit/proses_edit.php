<?php
	include "dbconfig.php";
	
	$nomor = $_POST['nomor'];
	$tanggal = $_POST['tanggal'];
	$store = $_POST['store'];
	$alamat = $_POST['alamat'];
	$kategori = $_POST['kategori'];
	$keterangan = $_POST['keterangan'];
	$id_job = $_POST['id_job'];
	$modal=mysqli_query($conn,"UPDATE jobs SET nomor = '$nomor', tanggal = '$tanggal', store = '$store', alamat = '$alamat', kategori = '$kategori', keterangan = '$keterangan' WHERE id_job = '$id_job'");
	header('location:admin.php');
	$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
			'html'=>$html // Set html
		);
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'Gambar gagal untuk diupload', // Set pesan
		);
?>