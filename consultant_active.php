<?php 

	include "connection/connection2.php"; // Using database connection file here



	$nic = $_GET['nic'];

	$query = "UPDATE consultant SET deletion_indicator = null WHERE nic = '$nic'";
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// user active
		$query2 = "UPDATE login SET deletion_indicator =null WHERE nic = '$nic'";
		$result2 = mysqli_query($connection, $query2);

		header('Location: consultant_list.php?msg=consultant_active');
	} else {
		header('Location: consultant_list.php?err=consultant_active_failed');
	}

?>

