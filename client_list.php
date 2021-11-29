<?php
session_start();

if(!isset($_SESSION['ConsultantUser']))
{
  header('Location: home.php');
}
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



      $client_list .= "<td><a href=send_exercise.php?nic={$client['nic']}>Create</a></td>";
      $client_list .= "<td><a href=send_diet.php?nic={$client['nic']}>Create</a></td>";
      $client_list .= "<td><a href=client_delete2.php?nic={$client['nic']}>Inactive</a></td>";

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
  <a href="#">Client list</a>
  <a href="client_list_inactive.php">Inactive client list</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Menu</button>  










<div class="table-responsive px-4">
  
  <div class="container text-end">

    <a class="btn btn-secondary btn-sm" href="check_user_available.php" target="_blank" role="button">+ Add Client</a>

  </div>

  <h5 class="display-6 text-center">Client list</h5>

  <table id="example" class="display table table-sm" style="font-size: 12px;">

    <thead>
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
        <th>Create exercise</th>
        <th>Create diet</th>
        <th>Inactive</th>

      </tr>
    </thead>
      <tbody>

      <?php echo $client_list; ?> 
      </tbody>

  </table>

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