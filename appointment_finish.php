<?php 

			include "connection/connection2.php"; // Using database connection file here



			$id = $_GET['id'];


			//UPDATE appointment status in db
			$query = "UPDATE appointment SET status='finished' WHERE id = '$id'";
			
			$result = mysqli_query($connection, $query);

			if ($result) {
				// appointment finished
				header('Location: consultant_dashboard.php?msg=appointment_finished');
			} else {
				// show error in url
				header('Location: consultant_dashboard.php?err=appointment_finish_failed');
			}
?>