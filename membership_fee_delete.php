<?php 

			include "connection/connection2.php"; // Using database connection file here



			$id = $_GET['id'];

			//delete membership fee from db
			$query = "DELETE FROM membership_fee WHERE id = '$id'";
			
			$result = mysqli_query($connection, $query);

			if ($result) {
				// membership fee deleted
				header('Location: membership_fee.php?msg=membership fee deleted');

			} else {
				header('Location: membership_fee.php?err=membership fee delete failed');
			}

?>

