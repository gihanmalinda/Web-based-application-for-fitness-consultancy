
<?php


$servername='localhost';
$username='root';
$password='';
$dbname = "health_club_fitness";

$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

?>




















<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Home</title>
  <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


























<!-- start session and send users to their dashboards -->
<?php

session_start();

    $message="";
    $role="";

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM login WHERE username='$username' AND password='$password' AND deletion_indicator is NULL";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0) 
        {
          while($row = mysqli_fetch_assoc($result))
          {
              if($row["role"] == "admin")
              {
                $_SESSION['AdminUser'] = $row["username"];
                header('Location: admin_dashboard.php');
              }
              elseif ($row["role"] == "consultant")
              {
                $_SESSION['ConsultantUser'] = $row["username"];
                header('Location: consultant_dashboard.php');
              }
              elseif($row["role"] == "client")
              {
                $_SESSION['ClientUser'] = $row["username"];
                header('Location: client_dashboard.php');
              }
          }
        }
        else
        {
          $message="Invalid Username or Password";
        }

}
?>

























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
          <a class="nav-link active" aria-current="page" href="">Home</a>
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

<!-- Start carousel -->

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/carousel/carousel1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/carousel/carousel2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/carousel/carousel3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/carousel/carousel4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/carousel/carousel5.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- End carousel -->


<!-- Start services -->
    <div class="row p-3 mb-2 bg-dark text-secondary">
    	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
    	<h5 class="text-center"><b>fitness assessments</b></h5>
    	<p class="text-center">A fitness assessment is a test or measurement completed by a fitness professional to get fitness or health information about a client. It can be biometric (related to the body) or assess the current level of fitness. </p></div>

    	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
    	<h5 class="text-center"><b>Exercise prescription</b></h5>
    	<p class="text-center">Exercise prescription commonly refers to the specific plan of fitness-related activities that are designed for a specified purpose, which is often developed by a fitness or rehabilitation specialist for the client or patient. </p> </div>

    	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
    	<h5 class="text-center"><b>Personal training</b></h5>
    	<p class="text-center">Exercise prescription commonly refers to the specific plan of fitness-related activities that are designed for a specified purpose, which is often developed by a fitness or rehabilitation specialist for the client or patient. </p> </div>

		<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
		<h5 class="text-center"><b>Performance enhancing training</b></h5>
    	<p class="text-center">Sports performance training is training of the body and mind to prepare the athlete for the rigors of a specific sport. </p> </div>

    	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
    	<h5 class="text-center"><b>Youth fitness</b></h5>
    	<p class="text-center">Youth fitness program will focus on teambuilding, participation, free play, proper form, and inclusivity.</p> </div>

    	<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-2">
    	<h5 class="text-center"><b>Diet control</b></h5>
    	<p class="text-center">Dieting is the practice of eating food in a regulated way to decrease, maintain, or increase body weight, or to prevent and treat diseases such as diabetes and obesity.</p> </div>

    </div>
<!-- End services -->

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->


<div class="d-grid gap-2 text-center">
	<a class="btn btn-dark" href="check_user_available.php" role="button"><h2>Register here</h2></a>
</div>


<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
















































<!-- Start form -->

<div class="d-flex justify-content-center align-items-center container ">

    <div class="row ">


        <form action="" method = "post">

        	<div class="form-group">
        	<img src="image/logo/HealthClubLogo2.jpg" width="310" height="70" class="rounded" alt="...">
        	</div>


        	<legend class="text-secondary text-center">Login</legend>

            <div class="form-group">
                <label for="inputUserName" class="control-label">Enter Username</label>
                <div class="col-md">
                	<input type="text" class="form-control form-control-md" id="username" placeholder="Enter your Username" name="username" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="control-label">Enter Password</label>
                <div class="col-md">
                	<input type="password" class="form-control form-control-md" id="password" placeholder="Enter your Password" name="password" required>
                </div>
            </div>

            <p style="color:red;"> <?php echo $message; ?> </p>

            <div class="form-group">
                <div class="col-md">
                	<a href="forget_password.php" class="link-secondary">Forget password</a>
                </div>
            </div>

            <div class="mt-2 col-md-12"></div> <!-- Margin between divs -->

            <div class="form-group">
                <div class="col-md">
                	<button type="submit" value="submit" name = "submit" class="btn btn-primary">Login</button>
                </div>
            </div>

        </form>

        </div>

    </div>

</div>

<!-- End form -->


































































<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

<!-- Start thumbnail -->
    <div class="text-light bg-dark">
    	<figure class="text-center">
		  <blockquote class="blockquote">
		    <p>“Physical fitness is the first requisite of happiness.”</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    Joseph Pilates <cite title="Source Title"></cite>
		  </figcaption>
		</figure>
    </div>
<!-- End thumbnail -->




<!--  Start card-->

<div class="row">

  <div class="col-sm-6 gx-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">How to build muscles</h5>
        <p class="card-text">Building muscle through exercise. People build muscle at different rates depending on their age, sex, and genetics, but muscle development significantly...</p>
        <a href="article_display.php" class="btn btn-primary">Read articles...</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 gx-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">How to lose weight</h5>
        <p class="card-text">Eat a high protein breakfast. Eating a high protein breakfast could help reduce cravings and calorie intake throughout the day...</p>
        <a href="article_display.php" class="btn btn-primary">Read articles...</a>
      </div>
    </div>
  </div>

</div>
<!--  End card-->

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->












<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<h2 class="text-center">We are here</h2>
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->






<!-- Add fitness center location on google map -->
<div class="row">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.8442985861295!2d80.03653982915644!3d7.08219599968034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDQnNTUuOSJOIDgwwrAwMicxMy41IkU!5e0!3m2!1sen!2slk!4v1624089057064!5m2!1sen!2slk" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

</div>






<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
















<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<h2 class="text-center">Find us on youtube</h2>
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->




<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->




<!-- two youtube videos of gym -->
<div class="container-fluid">
  <div class="row">

    <div class="col-sm-6 gx-5">
      <div class="embed-responsive embed-responsive-16by9">
        <center><iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/O0KncZbHPYo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
      </div>
    </div>

      <div class="col-sm-6 gx-5">
      <div class="embed-responsive embed-responsive-16by9">
        <center><iframe width="560" height="315" src="https://www.youtube.com/embed/3a6dtoAoEOc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
      </div>
    </div>

  </div>
</div>




<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->








 











<!-- Start footer -->
<footer class="bg-dark text-center text-white">

<!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Images -->
    <section class="">
      <div class="row">
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/1.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/2.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/3.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/4.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/5.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
          <div
            class="bg-image hover-overlay ripple shadow-1-strong rounded"
            data-ripple-color="light"
          >
            <img
              src="image/thumbnails/6.jpg"
              class="w-100"
            />
            <a href="#!">
              <div
                class="mask"
                style="background-color: rgba(251, 251, 251, 0.2);"
              ></div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Images -->
  </div>
  <!-- Grid container -->




<!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/Health-Club-Fitness-956695317874153/" target=”_blank” role="button">
      	<i class="bi bi-facebook">
      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/></svg>
      		</i>
      	</a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
      	<i class="bi bi-twitter">
      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
      			<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
      		</svg>
      	</i>
      </a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
      	<i class="bi bi-google"></i>
      	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
      		<path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
      		</svg>
      </a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
      	<i class="bi bi-instagram">
      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
      			<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
      		</svg>
      	</i>
      </a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
      	<i class="bi bi-linkedin">
      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
      			<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
      		</svg>
      	</i>
      </a>

    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

	<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.4);">
		No 7C, Radawana Road, Yakkala, Gampaha, Sri Lanka. (+94 77 241 9108)
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