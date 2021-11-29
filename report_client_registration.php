<?php error_reporting(0); ?>





<?php
session_start();

if(!isset($_SESSION['AdminUser']))
{
  header('Location: home.php');
}
?>




<?php





include "connection/connection3.php"; // Using database connection file here




if(isset($_POST['submit']))
{  

    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];
    

    $sql = "SELECT nic,name,gender,dob,email,address,mobile_no,attendance,date_joined FROM client WHERE date_joined BETWEEN '$date1' AND '$date2'";


    $clients = mysqli_query($conn, $sql);

    $client_list = '';

    while ($client = mysqli_fetch_assoc($clients)) {
      $client_list .= "<tr>";
      $client_list .= "<td>{$client['nic']}</td>";
      $client_list .= "<td>{$client['name']}</td>";
      $client_list .= "<td>{$client['gender']}</td>";
      $client_list .= "<td>{$client['dob']}</td>";
      $client_list .= "<td>{$client['email']}</td>";
      $client_list .= "<td>{$client['address']}</td>";
      $client_list .= "<td>{$client['mobile_no']}</td>";
      $client_list .= "<td>{$client['attendance']}</td>";
      $client_list .= "<td>{$client['date_joined']}</td>";

      $client_list .= "</tr>";
    }
}


?>






























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Client registerations</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

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
                    <li class="nav-item">
                        <a href="consultant_list.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Consultants</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="client_list_admin.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Clients</span>
                        </a>
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
                        <a href="membership_fee.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Memberships</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">





































  <h5 class="display-6 text-center">Client registerations</h5>




<div class="container px-4">

<form method="POST" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center" autocomplete="off">
    <input type="hidden" name="size" value="1000000">

    <h5>Find date between...</h5>
    
    <div class="col-auto">
      <input type="date" class="form-control" id="date1" name="date1" required>
    </div>

    <div class="col-auto">
        <label>and</label>
    </div> 
    <div class="col-auto">
      <input type="date" class="form-control" id="date2 " name="date2" required>
    </div>
    


    
    <div class="col-auto">
      <button class="btn btn-primary" type="submit" name="submit" >Find</button>
    </div>
  </form>




</div>





<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->







<button class="btn btn-outline-primary float-end" id="download">Download as pdf</button>
<div class="container-sm table-responsive px-4" id="invoice">
      <h5 class="display-6 text-center">Client list</h5>
<?php echo "Date " . date("Y.m.d") . "<br>"; ?>
  <table class="display table table-sm" style="font-size: 12px;">

    <thead>
      <tr>
        <th>NIC</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of birth</th>
        <th>Email</th>
        <th>Address</th>
        <th>Mobile no</th>
        <th>Attendance</th>
        <th>Date joined</th>
      </tr>
    </thead>
      <tbody>

      <?php echo $client_list; ?> 
      </tbody>

  </table>

</div>





<script type="text/javascript">
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0,
                filename: 'Client_registerations.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
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