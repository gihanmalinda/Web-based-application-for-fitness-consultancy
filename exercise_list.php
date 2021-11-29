<?php
session_start();
?>



<?php 

  include "connection/connection2.php"; // Using database connection file here


  $client_list = '';

  // getting the list of clients
  $query = "SELECT nic,name,gender,dob,email,address,mobile_no,injuries,non_spread_diseases,attendance FROM client WHERE deletion_indicator IS NULL ORDER BY name";
  $clients = mysqli_query($connection, $query);

  

    while ($client = mysqli_fetch_assoc($clients)) {
      $client_list .= "<tr>";
      $client_list .= "<td>{$client['nic']}</td>";
      $client_list .= "<td>{$client['name']}</td>";
      $client_list .= "<td>{$client['gender']}</td>";
      $client_list .= "<td>{$client['dob']}</td>";
      $client_list .= "<td>{$client['email']}</td>";
      $client_list .= "<td>{$client['address']}</td>";
      $client_list .= "<td>{$client['mobile_no']}</td>";
      $client_list .= "<td>{$client['injuries']}</td>";
      $client_list .= "<td>{$client['non_spread_diseases']}</td>";
      $client_list .= "<td>{$client['attendance']}</td>";


      $client_list .= "<td><a href=client_delete.php?nic={$client['nic']}>Delete</a></td>";
      $client_list .= "<td><a href=send_exercise.php?nic={$client['nic']}>Send exercise</a></td>";
      $client_list .= "<td><a href=send_diet.php?nic={$client['nic']}>Send diet</a></td>";

      $client_list .= "</tr>";
    }
 ?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>client list</title>

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







<div class="table-responsive px-4">
  






  <div class="container text-end">
    <a class="btn btn-secondary btn-sm" href="consultant_dashboard.php" role="button">Back to dashboard</a>
    <a class="btn btn-secondary btn-sm" href="client_registrationform.php" role="button">+ Add Client</a>

  </div>

  <h5 class="display-6 text-center">Client list</h5>

  <table class="table-sm">

    <thead class="">
      <tr>
        <th>NIC</th>
        <th>Name</th>
        <th>gender</th>
        <th>Date of birth</th>
        <th>Email</th>
        <th>Address</th>
        <th>Mobile no</th>
        <th>Injuries</th>
        <th>Non communicable diseases</th>
        <th>Attendance</th>
        <th>Delete</th>
        <th>Send exercise program</th>
        <th>Send diet plan</th>

      </tr>
    </thead>
      <tbody>

      <?php echo $client_list; ?> 
      </tbody>

  </table>

</div>



































































<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->

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