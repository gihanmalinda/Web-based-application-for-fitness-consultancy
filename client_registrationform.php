





<?php

include "connection/connection3.php"; // Using database connection file here


//get gate from form

if(isset($_POST['submit']))
{  
  $nic = $_POST["nic"];
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $dob = $_POST["dob"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $mobile_no = $_POST["mobile_no"];
  $weight = $_POST["weight"];
  $height = $_POST["height"];
  $injuries = $_POST["injuries"];
  $non_spread_diseases = $_POST["non_spread_diseases"];
  $attendance = $_POST["attendance"];
  $food_consumption = $_POST["food_consumption"];
  $client_username = $_POST["client_username"];
  $password = $_POST["password"];
  $role = $_POST["role"];


  //save data in client table
  $sql = "INSERT INTO client (nic,name,gender,dob,email,address,mobile_no,weight,height,injuries,non_spread_diseases,attendance,food_consumption,client_username,password) VALUES('$nic','$name','$gender','$dob','$email','$address','$mobile_no','$weight','$height','$injuries','$non_spread_diseases','$attendance','$food_consumption','$client_username','$password')";

  $query = mysqli_query($conn, $sql);

  if($query){
    //Give access to lagin
    $sql2 = "INSERT INTO login (nic,username,password,role) VALUES('$nic','$client_username','$password','$role')";
    $result = mysqli_query($conn, $sql2);

    header('location: registration_success.php');
  }
  else{
    //if error
    $message = " user already exists ! Registration Failed. Please Try again !";
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
    <title>Registration</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">





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
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="our_services.php">Our Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="staff.php">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="article_display">Articles</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- End heading -->

<div class="mt-2 col-md-12"></div> <!-- Margin between divs -->













<!-- Start form -->

<div class="container col-lg-8 offset-lg-2">



        <form action="" method="post" name="client_registration_form" onsubmit ="return validateForm()">

            <div class="form-group text-center">
            <img src="image/logo/HealthClubLogo2.jpg" width="310" height="70" class="rounded" alt="...">
            </div>


            <legend class="text-secondary text-center">Registration Form</legend>

            <h5>Personal Details</h5>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nic" placeholder="Enter your NIC" name="nic" pattern="[0-9]{9}[v-v]{1}" required>
              <label for="floatingInput">Enter NIC (Eg: 930521833v)</label>
            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" placeholder="Full name" name="name" pattern="[A-Za-z ]+" title="(Enter letters only)" required>
              <label for="floatingInput">Full name</label>
            </div>

            <div class="p-3 rounded border mb-3">
            Gender : &nbsp &nbsp
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                  <label class="form-check-label" for="inlineCheckbox1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                  <label class="form-check-label" for="inlineCheckbox2">Female</label>
                </div>
            </div>

            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="dob" placeholder="First Name" name="dob" required>
              <label for="floatingInput">Date of birth</label>
            </div>

            <h5>Contact Details</h5>

            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
              <label for="floatingInput">Email</label>

            </div>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="address" placeholder="Address" name="address" minlength="5" maxlength="100" required>
              <label for="floatingInput">Address</label>
            </div>

            <div class="form-floating mb-3">
              <input type="tel" class="form-control" id="mobile_no" placeholder="Mobile No" name="mobile_no" pattern="0[0-9]{9}" title="(Enter as example)" required>
              <label for="floatingInput">Mobile No (Eg: 0711234567)</label>
            </div>

            <h5>Body measurements</h5>

<!--             <div class="form-floating mb-3">
              <input type="number" class="form-control" id="weight" placeholder="Weight" name="weight" required>
              <label for="floatingInput">Weight (kg)</label>
            </div>

            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="height" placeholder="Height" name="height" required>
              <label for="floatingInput">Height (cm)</label>
            </div> -->




                  <div class="row gx-2 mb-3">
                    <div class="col">
                     <div class="p-3 rounded border">

                        Weight
                        <input type="range" class="form-range" min="1" max="200" oninput="this.nextElementSibling.value = this.value" id="weight" name="weight" required>
                        <output></output>kg

                        <script type="text/javascript">
                            document.registrationForm.kgInputId.oninput = function(){
                            document.registrationForm.kgOutputId.value = document.registrationForm.kgInputId.value;
                         }
                        </script>

                     </div>
                    </div>

                    <div class="col">
                      <div class="p-3 rounded border">
                        
                        Height
                        <input type="range" class="form-range" min="1" max="200" oninput="this.nextElementSibling.value = this.value" id="height" name="height" required>
                        <output></output>cm

                        <script type="text/javascript">
                            document.registrationForm.cmInputId.oninput = function(){
                            document.registrationForm.cmOutputId.value = document.registrationForm.cmInputId.value;
                         }
                        </script>

                      </div>
                    </div>
                  </div>







            <h5>Medical history</h5>

            <div class="form-floating mb-3">
              <textarea class="form-control form-control-sm" id="injuries" placeholder="Injuries" name="injuries" maxlength="200"></textarea>
              <label for="floatingInput">Injuries</label>
            </div>

            <div class="form-floating mb-3">
              <textarea class="form-control form-control-sm" id="non_spread_diseases" placeholder="Non spread diseases" name="non_spread_diseases" maxlength="200"></textarea>
              <label for="floatingInput">Non communicable diseases</label>
            </div>


            <h5>Other</h5>

<!--             <div class="form-floating mb-3">
              <input type="number" class="form-control" id="attendance" placeholder="How many days can you attend to gym?" name="attendance" required>
              <label for="floatingInput">How many days can you attend to gym within week?</label>
            </div> -->

            <div class="form-floating mb-3">
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="attendance" name="attendance" >
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
              </select>
              <label for="floatingInput">How many days can you attend to gym within week?</label>
            </div>


            <div class="form-floating mb-3">
              <textarea class="form-control form-control-sm" id="food_consumption" placeholder="Daily food consumption" name="food_consumption"></textarea>
              <label for="floatingInput">Daily food consumption (brief summary of daily food intake)</label>
            </div>

            <h5>Account security</h5>

            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="client_username" placeholder="username" name="client_username"  pattern="[A-Za-z.]{5,20}" required>
              <label for="floatingInput">Username (Only letters (either case) and the dot, 5-20 characters. Eg: dennis.iloyd)</label>
            </div>

            <div class="row">
              <div class="col">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <label for="floatingInput">Password</label>
                      </div>
              </div>
              <div class="col">
                <div class="p-3">
                  <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                </div>
              </div>
            </div>




            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
              <label for="floatingInput">Confirm password</label>
            </div>







            <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>




            <div class="form-floating mb-3">
              <input type="hidden" id="role" name="role" value="client">
            </div>




            <div class="form-group">
                <div class="col-md">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit" >Create account</button>

                    <button type="reset" class="btn btn-outline-primary" name="reset" value="Reset">Reset</button>
                </div>
            </div>

        </form>

</div>

<!-- End form -->


<!-- check password and confirmPassword is same -->
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





<!-- when type the password show how to create it -->
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



<!-- Show password when click eye -->
<script type="text/javascript">
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>














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