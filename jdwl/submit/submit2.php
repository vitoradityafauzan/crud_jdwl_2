<?php 

if(isset($_POST['id'])){

		$id = $_POST['id'];

		$link = mysqli_connect("localhost", "root", "", "magang");
		 
		// jalankan query
		$sql = "SELECT * FROM biodata WHERE id = '$id'";
		$result = mysqli_query($link, $sql);

		$show = mysqli_fetch_array($result, MYSQLI_ASSOC);

		echo json_encode($show);
		exit;
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id_job DESC ';
}

 ?>