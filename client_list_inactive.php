<?php
session_start();

if(!isset($_SESSION['ConsultantUser']))
{
  header('Location: home.php');
}
?>



















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inactive client list</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
  
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>








    <style>
      body {
        font-family: "Lato", sans-serif;
      }

      .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }

      .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      .sidebar a:hover {
        color: #f1f1f1;
      }

      .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }

      .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
      }

      .openbtn:hover {
        background-color: #444;
      }

      #main {
        transition: margin-left .5s;
        padding: 16px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
      }
  </style>

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
          <a class="nav-link"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"><?php echo $_SESSION['ConsultantUser']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-secondary btn-sm" role="button" href = "logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End heading -->

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->










<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href=""><p class="fs-2 text-white">Consultant dashboard</p></a>
  <a href="consultant_dashboard.php">Home</a>
  <a href="client_list.php">Client list</a>
  <a href="#">Inactive client list</a>

</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Menu</button>  










<div class="container">
  <div class="row justify-content-center">
    <div class="col-10">







<?php 

  include "connection/connection2.php"; // Using database connection file here


  $inactive_client_list = '';

  // getting the list of inactive_clients
  $query = "SELECT nic,name,gender,dob,email,address,mobile_no,injuries,non_spread_diseases FROM client WHERE deletion_indicator = 'x' ORDER BY name";
  $inactive_clients = mysqli_query($connection, $query);

  

    while ($inactive_client = mysqli_fetch_assoc($inactive_clients)) {
      $inactive_client_list .= "<tr>";
      $inactive_client_list .= "<td>{$inactive_client['nic']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['name']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['gender']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['dob']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['email']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['address']}</td>";
      $inactive_client_list .= "<td>{$inactive_client['mobile_no']}</td>";

      $inactive_client_list .= "<td><a href=client_active2.php?nic={$inactive_client['nic']}>Active</a></td>";
      $inactive_client_list .= "</tr>";
    }
 ?>





<div class="table-responsive px-4">
  

  <h5 class="display-6 text-center">Inactive Client List</h5>

  <table class="display table table-sm" id="example" style="font-size: 12px;">

    <thead>
      <tr>
        <th>NIC</th>
        <th>Name</th>
        <th>gender</th>
        <th>Date of birth</th>
        <th>Email</th>
        <th>Address</th>
        <th>Mobile no</th>
        <th>Active</th>


      </tr>
    </thead>
      <tbody>

      <?php echo $inactive_client_list; ?> 
      </tbody>

  </table>

</div>









    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>








</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>









































<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

































































<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->

<!-- Start footer -->
<footer class="bg-dark text-center text-white fixed-bottom">

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