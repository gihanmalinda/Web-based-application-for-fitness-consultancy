<?php
session_start();

if(!isset($_SESSION['ConsultantUser']))
{
  header('Location: home.php');
}
?>










<?php 

  include "connection/connection2.php"; // Using database connection file here


  $username = $_SESSION['ConsultantUser'];
  $appointment_list = '';


  // getting the list of appointments
  $query = "SELECT id,client_username,appointment_date,appointment_time FROM appointment WHERE deletion_indicator IS NULL AND consultant_username ='$username' AND status='pending' ORDER BY id";
  $appointments = mysqli_query($connection, $query);


  
      while ($appointment = mysqli_fetch_assoc($appointments)) {
      $appointment_list .= "<tr>";
      $appointment_list .= "<td>{$appointment['id']}</td>";
      $appointment_list .= "<td>{$appointment['client_username']}</td>";
      $appointment_list .= "<td>{$appointment['appointment_date']}</td>";
      $appointment_list .= "<td>{$appointment['appointment_time']}</td>";



      $appointment_list .= "<td><a href=appointment_accept.php?id={$appointment['id']}>accept</a></td>";
      $appointment_list .= "<td><a href=appointment_reject.php?id={$appointment['id']}>reject</a></td>";

      $appointment_list .= "</tr>";
    }



 ?>













<?php 

  include "connection/connection2.php"; // Using database connection file here


  $username = $_SESSION['ConsultantUser'];
  $accepted_appointment_list = '';


  // getting the list of accepted_appointments
  $query = "SELECT id,client_username,appointment_date,appointment_time FROM appointment WHERE deletion_indicator IS NULL AND consultant_username ='$username' AND status='accepted' ORDER BY id";
  $accepted_appointments = mysqli_query($connection, $query);


  
      while ($accepted_appointment = mysqli_fetch_assoc($accepted_appointments)) {
      $accepted_appointment_list .= "<tr>";
      $accepted_appointment_list .= "<td>{$accepted_appointment['id']}</td>";
      $accepted_appointment_list .= "<td>{$accepted_appointment['client_username']}</td>";
      $accepted_appointment_list .= "<td>{$accepted_appointment['appointment_date']}</td>";
      $accepted_appointment_list .= "<td>{$accepted_appointment['appointment_time']}</td>";



      $accepted_appointment_list .= "<td><a href=appointment_finish.php?id={$accepted_appointment['id']}>Done</a></td>";

      $accepted_appointment_list .= "</tr>";
    }



 ?>

















<?php 

  include "connection/connection2.php"; // Using database connection file here


  $username = $_SESSION['ConsultantUser'];
  $appointment_history = '';


  // getting the list of appointments_history
  $query = "SELECT id,client_username,appointment_date,appointment_time,status FROM appointment WHERE consultant_username ='$username' ORDER BY id";
  $appointments_histories = mysqli_query($connection, $query);


  
      while ($appointments_history = mysqli_fetch_assoc($appointments_histories)) {
      $appointment_history .= "<tr>";
      $appointment_history .= "<td>{$appointments_history['id']}</td>";
      $appointment_history .= "<td>{$appointments_history['client_username']}</td>";
      $appointment_history .= "<td>{$appointments_history['appointment_date']}</td>";
      $appointment_history .= "<td>{$appointments_history['appointment_time']}</td>";
      $appointment_history .= "<td>{$appointments_history['status']}</td>";


      $appointment_history .= "</tr>";
    }



 ?>
























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Consultant dashboard</title>
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










<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href=""><p class="fs-2 text-white">Consultant dashboard</p></a>
  <a href="#">Home</a>
  <a href="client_list.php">Client list</a>
  <a href="client_list_inactive.php">Inactive client list</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Menu</button>  








<h2 class="text-center">Welcome to Health Club Fitness</h2>








<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h3 class="text-center">Consultant Profile</h3>
<table class="table table-striped">

<?php

include "connection/connection.php"; // Using database connection file here


$username = $_SESSION['ConsultantUser'];


$records = mysqli_query($db," SELECT nic, name, email,  address,  mobile_no,  dob,  qualification,  experience FROM `consultant` WHERE deletion_indicator IS NULL AND username ='$username' "); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
    <tr><td>NIC:</td>              <td> <?php echo $data['nic']; ?> </td></tr>
    <tr><td>Name:</td>             <td> <?php echo $data['name']; ?> </td></tr>
    <tr><td>Email:</td>            <td> <?php echo $data['email']; ?> </td></tr>
    <tr><td>Address:</td>          <td> <?php echo $data['address']; ?> </td></tr>
    <tr><td>Mobile no:</td>        <td> <?php echo $data['mobile_no']; ?> </td></tr>
    <tr><td>Date of birth:</td>    <td> <?php echo $data['dob']; ?> </td></tr>
    <tr><td>Qualification:</td>    <td> <?php echo $data['qualification']; ?> </td></tr>
    <tr><td>Experience:</td>       <td> <?php echo $data['experience']; ?> </td></tr>
    <tr><td></td>     <td> <a href=consultant_update2.php?nic=<?php echo $data['nic'] ?>>Click here edit profile</a> </td></tr>



<?php
}
?>
</table>
<?php mysqli_close($db);  // close connection ?>
        </div>
    </div>
</div>
























<div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">


              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
              <h3 class="text-center">Pending Appointments</h3>
              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

                <table class="table table-borderless" style="font-size: 14px;">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Accept</th>
                      <th>Reject</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php echo $appointment_list; ?> 
                    </tbody>

                </table>


     </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">


              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
              <h3 class="text-center">Accepted Appointments</h3>
              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

                <table class="table table-borderless " style="font-size: 14px;">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php echo $accepted_appointment_list; ?> 
                    </tbody>

                </table>

      </div>
    </div>
  </div>
</div>











<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->






<div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">


              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
              <h3 class="text-center">All Appointments</h3>
              <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

                <table class="table table-borderless" id="example" style="font-size: 14px;">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Client</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>

                  </thead>
                    <tbody>

                    <?php echo $appointment_history; ?> 
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