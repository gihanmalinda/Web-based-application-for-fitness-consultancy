<?php
session_start();

if(!isset($_SESSION['AdminUser']))
{
  header('Location: home.php');
}
?>




<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "health_club_fitness";

$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}





if(isset($_POST['submit']))
{  

  $client_nic = $_POST["client_nic"];
  $client_name = $_POST["client_name"];
  $payment_status = $_POST["payment_status"];


   $sql = "INSERT INTO membership_fee (client_nic,client_name,payment_status) 

   VALUES('$client_nic','$client_name','$payment_status')";



   if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully !";
   } 

   else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    // $message = " Failed to add diet plan. Try again !";
    // echo "<script type='text/javascript'>alert('$message');</script>";

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
    <title>Membership fee</title>
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
                        <a href="article_upload.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Articles</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="appointment_list.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Appointments</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
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





































  <h5 class="display-6 text-center">Membership</h5>




<div class="container px-4">

<form method="POST" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center" autocomplete="off">
    <input type="hidden" name="size" value="1000000">

    <h5>Register client as a member of gym...</h5>
    
    <div class="col-auto">
      <input class="form-control" placeholder="Enter client NIC" type="text" id="client_nic" name="client_nic" pattern="[0-9]{9}[v-v]{1}" required>
    </div>

    <div class="col-auto">
      <input type="text" class="form-control" id="client_name " placeholder="Name" name="client_name" pattern="[A-Za-z ]+" title="(Enter letters only)" required>
    </div>
    
    <div class="col-auto">
      <select class="form-select" aria-label=".form-select-sm example" name="payment_status" required>
        <option value="Paid">Paid</option>
        <option value="Free">Free</option>
      </select>
    </div>


    
    <div class="col-auto">
      <button class="btn btn-primary" type="submit" name="submit" >Add payment</button>
    </div>
  </form>




</div>






<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->


  <h5 class="display-6 text-center">Payment list</h5>

















<?php 

  include "connection/connection2.php"; // Using database connection file here

  $membership_list = '';

  // getting the list of memberships
  $query = "SELECT * FROM membership_fee ORDER BY id";
  $memberships = mysqli_query($connection, $query);

  

    while ($membership = mysqli_fetch_assoc($memberships)) {
      $membership_list .= "<tr>";
      $membership_list .= "<td>{$membership['id']}</td>";
      $membership_list .= "<td>{$membership['client_nic']}</td>";
      $membership_list .= "<td>{$membership['client_name']}</td>";
      $membership_list .= "<td>{$membership['payment_status']}</td>";
      $membership_list .= "<td>{$membership['date_payment']}</td>";

      $membership_list .= "<td><a href=membership_f_delete.php?id={$membership['id']} onclick='return checkdelete()'>Delete</a></td>";
      $membership_list .= "</tr>";
    }
 ?>



<script type="text/javascript">
    function checkdelete{
        return Confirm('Sure?');
    }
</script>





















<div class="container-sm table-responsive px-4">

  <table class="table table-dark table-striped">

    <thead>
      <tr>
        <th>ID</th>
        <th>Client NIC</th>
        <th>Client Name</th>
        <th>payment_status</th>
        <th>Payment Date</th>
        <th>Delete</th>
      </tr>
    </thead>
      <tbody>

      <?php echo $membership_list; ?> 
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