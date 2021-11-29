<?php 

	include "connection/connection2.php"; // Using database connection file here



	$nic = $_GET['nic'];

	$query = "UPDATE consultant SET deletion_indicator='x' WHERE nic = '$nic'";
	
	$result = mysqli_query($connection, $query);

	if ($result) {
		// user deleted
		$query2 = "UPDATE login SET deletion_indicator='x' WHERE nic = '$nic'";
		$result2 = mysqli_query($connection, $query2);

		header('Location: consultant_list.php?msg=consultant_deleted');
	} else {
		header('Location: consultant_list.php?err=consultant_failed');
	}

?>

