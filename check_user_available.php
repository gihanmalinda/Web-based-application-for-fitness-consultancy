

<?php
include "connection/connection3.php"; // Using database connection file here



session_start();








$message="";


if(isset($_POST['submit']))
{  
  $client_nic = $_POST["client_nic"];



    $sql = "SELECT client_nic FROM membership_fee where client_nic = '$client_nic'";

    $sqlraw = mysqli_query($conn,$sql);

    if (mysqli_num_rows($sqlraw) > 0) {
        // $message = "You have paid the membership fee... !";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        header('location: client_registrationform.php');
    }

    else{
        $message = "You haven't paid the membership fee. Please pay and try again..!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // header('location: home.php');
    }


   mysqli_close($conn);
}







?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Check registered</title>
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
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="our_services.php">Our Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="staff.php">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="article_display.php">Articles</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End heading -->

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

















<div class="container">
  <div class="row">
    <div class="col">
      
    </div>


    <div class="col">
      <div class="alert alert-secondary d-flex justify-content-center align-items-center container " role="alert">
        Please enter you NIC to find payment status
      </div>
      <div>
        <form action="" method="post">
        <div class="mb-3">
          <input type="text" class="form-control" id="client_nic" placeholder="Enter your NIC" name="client_nic" pattern="[0-9]{9}[v-v]{1}" required>
          <div class="form-text">* If you not paid the membership. Please pay and try again.</div>
        </div>
          <p style="color:red;"> <?php echo $message; ?> </p>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>

      </form>
      </div>
    </div>

    <div class="col">
      
    </div>
  </div>
</div>























































<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->

<!-- Start footer -->
<footer class="fixed-bottom bg-dark text-center text-white">

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