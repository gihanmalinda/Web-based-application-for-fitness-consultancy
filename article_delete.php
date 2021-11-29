<?php 

			include "connection/connection2.php"; // Using database connection file here



			$id = $_GET['id'];

			//delete article from db
			$query = "DELETE FROM article WHERE id = '$id'";
			
			$result = mysqli_query($connection, $query);

			if ($result) {
				// Article deleted
				header('Location: article_upload.php?msg=article_deleted');

			} else {
				header('Location: article_upload.php?err=delete_failed');
			}

?>

