<!-- Start session -->

<?php
session_start();

if(!isset($_SESSION['AdminUser']))
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
    <title>Admin dashboard</title>
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
                        <a href="#" class="nav-link align-middle px-0">
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












<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

<h2 class="text-center">Welcome to Health club fitness</h2>

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

<div class="shadow-lg p-3 mb-5 bg-body rounded text-center"><p class="fs-2 text-primary">Reports</p></div>







<!-- pre defined reports using bootstrap card -->
<div class="container">
  <div class="row">
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/activeClientList.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Active clients</h5>
            <p class="card-text">Click here to download the list of active clients who registered in the system. The report shows the basic client information and contact details.</p>
            <a href="report_client_list.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/activeConsultantList.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Active consultants</h5>
            <p class="card-text">Click here to download the list of active consultant who registered in the system. The report shows the basic client information and contact details.</p>
            <a href="report_consultant_list.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/clientGender.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Client gender composition</h5>
            <p class="card-text">Click here to download the client gender composition in gym. The report show how many male and female clients use the facility of the fitness centre.</p>
            <a href="report_gender_composition.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
  </div>
</div>





<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->







<div class="container">
  <div class="row">
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/appointmentList.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Current month appointments</h5>
            <p class="card-text">Click here to download the current month appointment list in the fitness centre. The report shows the information of current month appointments.</p>
            <a href="report_current_month_appointments.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/uploadedArticle.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Uploaded articles</h5>
            <p class="card-text">Click here to download the uploaded article list to the fitness centre web site. The report shows the information of all uploaded articles.</p>
            <a href="report_article_list.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/uploadedArticleComposition.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Articles and advertisements composition</h5>
            <p class="card-text">Click here to download the articles and advertisements composition of the fitness centre web site. The report shows the  total number of articles and advertisements.</p>
            <a href="report_article_composition.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
  </div>
</div>







<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->







<div class="container">
  <div class="row">
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/clientAgeTypes.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Client age groups</h5>
            <p class="card-text">Click here to download the client age groups in the fitness centre. The report shows the information of client age groups.</p>
            <a href="report_client_age_group.php" class="btn btn-primary">Download</a>
          </div>
        </div>

    </div>
    <div class="col">

        <div class="card" style="width: 18rem;">
        <img src="image/report/findClientRegisteration.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Client registerations</h5>
            <p class="card-text">Click here to find client registeration details in specific period they registered. The report shows the information of client in specific period.</p>
            <a href="report_client_registration.php" class="btn btn-outline-primary">find</a>
          </div>
        </div>

    </div>
    <div class="col">



    </div>
  </div>
</div>


<!-- end card -->





































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