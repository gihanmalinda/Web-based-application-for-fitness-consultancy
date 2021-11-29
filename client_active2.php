<?php 

	include "connection/connection2.php"; // Using database connection file here



	$nic = $_GET['nic'];

	$query = "UPDATE client SET deletion_indicator = null WHERE nic = '$nic'";
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// user deleted
		$query2 = "UPDATE login SET deletion_indicator = null WHERE nic = '$nic'";
		$result2 = mysqli_query($connection, $query2);

		header('Location: client_list.php?msg=client_actived');
	} else {
		header('Location: client_list.php?err=client_active_failed');
	}

?>

