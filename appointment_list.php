<!-- Start session -->
<?php
session_start();

if(!isset($_SESSION['AdminUser']))
{
  header('Location: home.php');
}
?>











<?php 

  include "connection/connection2.php"; // Using database connection file here

  $appointment_list = '';

  // getting the list of appointments from db
  $query = "SELECT id, client_username, consultant_username, appointment_date, appointment_time, status FROM appointment";
  $appointments = mysqli_query($connection, $query);

  

    while ($appointment = mysqli_fetch_assoc($appointments)) {
      $appointment_list .= "<tr>";
      $appointment_list .= "<td>{$appointment['id']}</td>";
      $appointment_list .= "<td>{$appointment['client_username']}</td>";
      $appointment_list .= "<td>{$appointment['consultant_username']}</td>";
      $appointment_list .= "<td>{$appointment['appointment_date']}</td>";
      $appointment_list .= "<td>{$appointment['appointment_time']}</td>";
      $appointment_list .= "<td>{$appointment['status']}</td>";

      $appointment_list .= "</tr>";
    }
 ?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Appointment list</title>
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
                        <a href="#" class="nav-link align-middle px-0">
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








































  <h5 class="display-6 text-center">Appointment list</h5>






<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->



<!-- show appointment list in table-->
<div class="container-sm table-responsive px-4">

  <table class="table table-dark table-striped" id="example">

    <thead>
      <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Consultant</th>
        <th>Date</th>
        <th>Time</th>
        <th>status</th>
      </tr>
    </thead>
      <tbody>

      <?php echo $appointment_list; ?> 
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