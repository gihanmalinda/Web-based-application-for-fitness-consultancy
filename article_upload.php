<!-- start session -->
<?php
session_start();

if(!isset($_SESSION['AdminUser']))
{
  header('Location: home.php');
}
?>





<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "health_club_fitness");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "image/".basename($image);

    $post_type = $_POST["post_type"];

    $sql = "INSERT INTO article (name, post_type, image) VALUES ('$image_text','$post_type','$target')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      //echo $msg = "Image uploaded successfully";

      // $message = "Image uploaded successfully";
      // echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM article");
?>







<?php 

  include "connection/connection2.php"; // Using database connection file here

  $article_list = '';

  // getting the list of articles
  $query = "SELECT * FROM article ORDER BY id";
  $articles = mysqli_query($connection, $query);

  

    while ($article = mysqli_fetch_assoc($articles)) {
      $article_list .= "<tr>";
      $article_list .= "<td>{$article['id']}</td>";
      $article_list .= "<td>{$article['name']}</td>";
      $article_list .= "<td>{$article['post_type']}</td>";
      $article_list .= "<td>{$article['image']}</td>";
      $article_list .= "<td>{$article['date_upload']}</td>";

      $article_list .= "<td><a href=article_delete.php?id={$article['id']}>Delete</a></td>";
      $article_list .= "</tr>";
    }
 ?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Upload article</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>


<body>

<!-- Start heading -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
    <img src="image/logo/HealthClubLogo.png" alt="" width="80" height="40" class="d-inline-block align-text-top">
        Health club fitness</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active"><?php echo $_SESSION['AdminUser']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-secondary btn-sm" role="button" href = "logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End heading -->





















<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <span class="fs-5 d-none d-sm-inline">Admin Dashboard</span>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="admin_dashboard.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>



                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Consultants</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="consultant_list.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Active consultants</span> </a>
                            </li>
                            <li>
                                <a href="consultant_list_inactive.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Inactive consultants</span> </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Clients</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="client_list_admin.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Active Clients</span></a>
                            </li>
                            <li>
                                <a href="client_list_admin_inactive.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Inactive Clients</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Articles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="appointment_list.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="membership_fee.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Memberships</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="email_send.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Send mail</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">





































  <h5 class="display-6 text-center">Web posts</h5>




<div class="container px-4">

<form method="POST" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center">
    <input type="hidden" name="size" value="1000000">

    <h5>Upload your post from here...</h5>
    
    <div class="col-auto">
      <input class="form-control form-control-sm" type="file" name="image" id="image" oninput="validateFileType()" required>
    </div>
    
    <div class="col-auto">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="post_type" required>
        <option value="Article" selected>Article</option>
        <option value="Advertisement">Advertisement</option>
      </select>
    </div>

    <div class="col-auto">
     <input class="form-control form-control-sm" placeholder="Enter image title" type="text" id="text" name="image_text" required> 
    </div>
    
    <div class="col-auto">
      <button class="btn btn-primary btn-sm" type="submit" name="upload" >Post</button>
    </div>
  </form>


      <script type="text/javascript">
          function validateFileType(){
              var fileName = document.getElementById("image").value;
              var idxDot = fileName.lastIndexOf(".") + 1;
              var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
              if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
                  //TO DO
              }else{
                  alert("Only jpg/jpeg and png files are allowed!");
                  document.getElementById("image").value = "";
              }   
          }
      </script>






</div>






<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->


  <h5 class="display-6 text-center">Web posts list</h5>






































<div class="container-sm table-responsive px-4">

  <table class="table table-dark table-striped">

    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Post type</th>
        <th>Image</th>
        <th>Date upload</th>
        <th>Delete</th>
      </tr>
    </thead>
      <tbody>

      <?php echo $article_list; ?> 
      </tbody>

  </table>

</div>































        </div>
    </div>
</div>


























<!-- Start footer -->
<footer class="bg-dark text-center text-white">

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.4);">
        No 7C, Radawana Road, Yakkala, Gampaha, Sri Lanka. (+94772419108)
    </div>


    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright: Health club fitness
    </div>
    <!-- Copyright -->
</footer>
<!-- End footer -->





</body>
</html>