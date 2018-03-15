<?php
	require_once 'dbconfig.php';
	
	if ($_REQUEST['delete']) {
		
		$id = $_REQUEST['delete'];
		$query = "DELETE FROM jobs WHERE id_job='$id'";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array('id_job'=>$id));
		
		if ($stmt) {
			echo "Data Deleted Successfully!";
		}
		
	}