<?php
session_start();

if(!isset($_SESSION['ConsultantUser']))
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
  $nic = $_POST["nic"];
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $mobile_no = $_POST["mobile_no"];
  $dob = $_POST["dob"];
  $qualification = $_POST["qualification"];
  $experience = $_POST["experience"];
  $password = $_POST["password"];



   $sql = "UPDATE consultant SET name='$name', username='$username', email='$email', address='$address', mobile_no='$mobile_no', dob='$dob', qualification='$qualification', experience='$experience', password='$password' WHERE nic='$nic'";


  $query = mysqli_query($conn, $sql);

  if($query){
    $sql2 = "UPDATE login SET username='$username', password='$password' WHERE nic='$nic'";
    $result = mysqli_query($conn, $sql2);

    $message = "New consultant update successfully !";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    $message = " Failed to update consultant. Try again !";
    // echo "<script type='text/javascript'>alert('$message');</script>";
  }
}





$result = mysqli_query($conn,"SELECT nic,name,username,email,address,mobile_no,dob,qualification,experience,password FROM consultant WHERE nic='" . $_GET['nic'] . "'");

$row= mysqli_fetch_array($result);


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Update consultant</title>
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




<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->

















<div class="container">
  <div class="row">
    <div class="col">

    </div>
    <div class="col-6">





<form name="frmUser" method="post" action="" enctype="multipart/form-data" class="align-items-center">
  <input type="hidden" name="size" value="1000000">

<div>
  <p style="color:green;"> <?php if(isset($message)) { echo $message; } ?> </p>
</div>


<a class="btn btn-secondary btn-sm" href="consultant_dashboard.php" role="button">Back to profile</a>

<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

  <h5 class="display-6 text-center">Update consultant</h5>


<div class="col-auto mb-3">
NIC : <?php echo $row['nic']; ?>
<input type="hidden" name="nic" class="txtField" value="<?php echo $row['nic']; ?>">
</div>


<div class="col-auto mb-3">
Name
<input type="text" class="form-control form-control-sm" name="name" pattern="[A-Za-z ]+" value="<?php echo $row['name']; ?>">
</div>


<div class="col-auto mb-3">
Username
<input type="text" class="form-control form-control-sm" name="username" pattern="[A-Za-z.]{5,20}" value="<?php echo $row['username']; ?>">
</div>


<div class="col-auto mb-3">
Email
<input type="email" class="form-control form-control-sm" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $row['email']; ?>">
</div>


<div class="col-auto mb-3">
Address
<input type="text" class="form-control form-control-sm" name="address" minlength="5" maxlength="100" value="<?php echo $row['address']; ?>">
</div>



<div class="col-auto mb-3">
Mobile no
<input type="tel" class="form-control form-control-sm" name="mobile_no" pattern="0[0-9]{9}" value="<?php echo $row['mobile_no']; ?>">
</div>



<div class="col-auto form-floating mb-3">
<input type="Date" class="form-control form-control-sm" name="dob" value="<?php echo $row['dob']; ?>">
<label for="floatingInput">Date of birth</label>
</div>



<div class="col-auto mb-3">
Qualification
<input type="text" class="form-control form-control-sm" name="qualification" value="<?php echo $row['qualification']; ?>">
</div>



<div class="col-auto mb-3">
Experience
<input type="text" class="form-control form-control-sm" name="experience" value="<?php echo $row['experience']; ?>">
</div>



<div class="col-auto mb-3">
Password
<input type="password" class="form-control form-control-sm" name="password" class="txtField" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $row['password']; ?>">
</div>


<div class="col-auto mb-3">
<button type="submit" class="btn btn-primary btn-sm" name="submit" value="Submit" class="buttom">Update consultant</button>
</div>

</form>





    </div>
    <div class="col">

    </div>
  </div>
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