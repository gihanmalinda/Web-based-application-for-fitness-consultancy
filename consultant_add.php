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
  $role = $_POST["role"];



   $sql = "INSERT INTO consultant (nic,name,username,email,address,mobile_no,dob,qualification,experience,password) VALUES('$nic','$name','$username','$email','$address','$mobile_no','$dob','$qualification','$experience','$password')";


  $query = mysqli_query($conn, $sql);

  if($query){
    $sql2 = "INSERT INTO login (nic,username,password,role) VALUES('$nic','$username','$password','$role')";
    $result = mysqli_query($conn, $sql2);

    $message = "New consultant added successfully !";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    $message = " Failed to add consultant. Try again !";
    echo "<script type='text/javascript'>alert('$message');</script>";
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
    <title>Add consultant</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>







    <style>
    /* Style all input fields */
      input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
      }

      /* Style the submit button */
      input[type=submit] {
        background-color: #04AA6D;
        color: white;
      }

      /* Style the container for inputs */
      .container {
        background-color: #f1f1f1;
        padding: 20px;
      }

      /* The message box is shown when the user clicks on the password field */
      #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
      }

      #message p {
        padding: 10px 35px;
        font-size: 18px;
      }

      /* Add a green text color and a checkmark when the requirements are right */
      .valid {
        color: green;
      }

      .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
      }

      /* Add a red text color and an "x" when the requirements are wrong */
      .invalid {
        color: red;
      }

      .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
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
                </ul>
                <hr>
            </div>
        </div>
        <div class="col py-3">










































<!-- Start form -->
<div class="container px-4 col-lg-8 offset-lg-2">

<form method="POST" action="" enctype="multipart/form-data" class="align-items-center" onsubmit ="return validateForm()">
    <input type="hidden" name="size" value="1000000">

    <a class="btn btn-secondary btn-sm" href="consultant_list.php" role="button">Back to consultant list</a>

    <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->

    <h5 class="display-6 text-center">Add consultant</h5>
    
    <div class="col-auto mb-3">
      <input class="form-control form-control-sm" placeholder="NIC" type="text" id="nic"  name="nic" pattern="[0-9]{9}[v-v]{1}" required>
    </div>
    
    <div class="col-auto mb-3">
     <input class="form-control form-control-sm" placeholder="Full name" type="text" id="name"  name="name" pattern="[A-Za-z ]+" title="(Enter letters only)" required> 
    </div>

    <div class="col-auto mb-3">
     <input class="form-control form-control-sm" placeholder="Username" type="text" id="username"  name="username" pattern="[A-Za-z.]{5,20}" required>
    </div>

    <div class="col-auto mb-3">
     <input class="form-control form-control-sm" placeholder="Email" type="email" id="email"  name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
    </div>

    <div class="col-auto mb-3">
     <input class="form-control form-control-sm" placeholder="Address" type="text" id="address"  name="address" minlength="5" maxlength="100" required>
    </div>

    <div class="col-auto mb-3">
     <input class="form-control form-control-sm" placeholder="Mobile No (Eg: 0711234567)" type="tel" id="mobile_no"  name="mobile_no" pattern="0[0-9]{9}" title="(Enter as example)" required>
    </div>

    <div class="col-auto form-floating mb-3">
     <input class="form-control form-control-sm" placeholder="Date of birth" type="date" id="dob"  name="dob" required>
     <label for="floatingInput">Date of birth</label>
    </div>

    <div class="col-auto mb-3">
      <textarea class="form-control form-control-sm" placeholder="Qualification" id="qualification" name="qualification" minlength="5" maxlength="300" required></textarea>
    </div>

    <div class="col-auto mb-3">
      <textarea class="form-control form-control-sm" placeholder="Experience" id="experience" name="experience" minlength="5" maxlength="300" required></textarea>
    </div>

    <div class="col-auto mb-3">
      <input type="password" class="form-control form-control-sm" id="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </div>

    <div class="col-auto mb-3">
      <input type="password" class="form-control form-control-sm" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
    </div>




    <div id="message">
      <h3>Password must contain the following:</h3>
      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
      <p id="number" class="invalid">A <b>number</b></p>
      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>





    <div class="form-floating mb-3">
      <input type="hidden" id="role" name="role" value="consultant">
    </div>


    
    <div class="col-auto mb-3">
      <button class="btn btn-primary btn-sm" type="submit" id="submit" name="submit">Add consultant</button>
      <button class="btn btn-outline-primary btn-sm" type="reset" name="reset" value="Reset">Reset</button>
    </div>
  </form>

</div>
<!-- End form -->


<script type="text/javascript">
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script> 





<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
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