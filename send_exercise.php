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
  $duration = $_POST["duration"];
  $ex1 = $_POST["ex1"];
  $rep1 = $_POST["rep1"];
  $ex2 = $_POST["ex2"];
  $rep2 = $_POST["rep2"];
  $ex3 = $_POST["ex3"];
  $rep3 = $_POST["rep3"];
  $ex4 = $_POST["ex4"];
  $rep4 = $_POST["rep4"];
  $ex5 = $_POST["ex5"];
  $rep5 = $_POST["rep5"];
  $ex6 = $_POST["ex6"];
  $rep6 = $_POST["rep6"];
  $ex7 = $_POST["ex7"];
  $rep7 = $_POST["rep7"];
  $ex8 = $_POST["ex8"];
  $rep8 = $_POST["rep8"];
  $instruction = $_POST["instruction"];


   $sql = "INSERT INTO exercise_program (client_nic,duration,exercise1,rep1,exercise2,rep2,exercise3,rep3,exercise4,rep4,exercise5,rep5,exercise6,rep6,exercise7,rep7,exercise8,rep8,instruction) 

   VALUES('$nic','$duration','$ex1','$rep1','$ex2','$rep2','$ex3','$rep3','$ex4','$rep4','$ex5','$rep5','$ex6','$rep6','$ex7','$rep7','$ex8','$rep8','$instruction')";



   if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully !";
    $message = "New exercise program added successfully !";
    echo "<script type='text/javascript'>alert('$message');</script>";
   } 

   else {
//     echo "Error: " . $sql . "
// " . mysqli_error($conn);
    $message = " Failed to add exercise program. Try again !";
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
    <title>Create exercise program</title>
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







<div class="container">
  <div class="row">
    <div class="col">
        <a class="btn btn-secondary btn-sm" href="client_list.php" role="button">Back to client list</a>
    </div>
    <div class="col">

    </div>
    <div class="col">




<p>
  <a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    View last exercise program
  </a>

</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">


        <table class="table table-dark">

        <?php
        include "connection/connection.php"; // Using database connection file here

        $nic = $_GET['nic'];

        $records = mysqli_query($db,"SELECT duration,date_created,instruction,exercise1,rep1,exercise2,rep2,exercise3,rep3,exercise4,rep4,exercise5,rep5,exercise6,rep6,exercise7,rep7,exercise8,rep8 FROM exercise_program WHERE deletion_indicator IS NULL AND client_nic ='$nic' ORDER BY id DESC LIMIT 1 "); // fetch data from database

        while($data = mysqli_fetch_array($records))
        {
        ?>
            <tr>Duration : <?php echo$data['duration']; ?> </tr><br>
            <tr>Date created : <?php echo$data['date_created']; ?></tr><br>
            <tr>Instruction : <?php echo$data['instruction']; ?></tr><br>
            <tr><td><?php echo$data['exercise1']; ?></td> <td><?php echo$data['rep1']; ?></td></tr>
            <tr><td><?php echo$data['exercise2']; ?></td> <td><?php echo$data['rep2']; ?></td></tr>
            <tr><td><?php echo$data['exercise3']; ?></td> <td><?php echo$data['rep3']; ?></td></tr>
            <tr><td><?php echo$data['exercise4']; ?></td> <td><?php echo$data['rep4']; ?></td></tr>
            <tr><td><?php echo$data['exercise5']; ?></td> <td><?php echo$data['rep5']; ?></td></tr>
            <tr><td><?php echo$data['exercise6']; ?></td> <td><?php echo$data['rep6']; ?></td></tr>
            <tr><td><?php echo$data['exercise7']; ?></td> <td><?php echo$data['rep7']; ?></td></tr>
            <tr><td><?php echo$data['exercise8']; ?></td> <td><?php echo$data['rep8']; ?></td></tr>


        <?php
        }
        ?>
        </table>
        <?php mysqli_close($db);  // close connection ?>


          </div>
        </div>


    </div>
  </div>
</div>









<div class="container px-4 col-lg-8 offset-lg-2">





<form name="frmUser" method="post" action="" enctype="multipart/form-data" class="align-items-center">
  
  <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
  <h5 class="display-6 text-center">Create exercise program</h5>





  <?php  $nic = $_GET['nic']; ?>

  <div class="col-auto mb-3">
  NIC :
  <label> <?php echo $nic; ?> </label>
  <input type="hidden" name="nic" value="<?php echo $nic; ?>">
  </div>


  <div class="col-auto mb-3">
    Duration
  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="duration">
    <option value="One month program" selected>One month program</option>
    <option value="Two month program">Two month program</option>
    <option value="Three month program">Three month program</option>
  </select>
  </div>

  Select exercises, Rseps and sets  :

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex2">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep1" required>
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex2">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep2">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex3">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep3">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex4">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep4">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex5">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep5">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex6">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep6">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex7">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep7">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ex8">
        <option value="" selected></option>
        <option value="Bench press">Bench press</option>
        <option value="Cross over">Cross over</option>
        <option value="Barbell curl">Barbell curl</option>
        <option value="Hammer curl">Hammer curl</option>
        <option value="Machine rowing">Machine rowing</option>
        <option value="One arm rowing">One arm rowing</option>
        <option value="Cable press down">Cable press down</option>
        <option value="Dumbbell extension">Dumbbell extension</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rep8">
        <option value="" selected></option>
        <option value="12*3">12*3</option>
        <option value="12*2">12*2</option>
        <option value="10*3">10*3</option>
        <option value="10*2">10*2</option>
        <option value="8*3">8*3</option>
        <option value="8*2">8*2</option>
      </select>
    </div>
  </div>


  <div class="col-auto mb-3">
    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Calculate client's 1RM
    </button>
  </div>




  <div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Leave a comment here" id="instruction" value="instruction" name="instruction"></textarea>
    <label for="floatingTextarea">Instructions</label>
  </div>

  <div class="col-auto mb-3">
  <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit" class="buttom">Send exercise program</button>
  </div>

</form>



</div>












<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Calculate 1RM</h5>
      </div>
      <div class="modal-body">


      <form method="POST" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center">

          <div class="col-auto">
            <input class="form-control form-control-sm" placeholder="Weight (kg)" type="text" id="weight"  name="weight" pattern="\d*" maxlength="2" required>
          </div>


          <div class="col-auto">
            <input class="form-control form-control-sm" placeholder="Reps" type="text" id="reps"  name="reps" pattern="\d*" maxlength="2" required> 
          </div>

          <div class="col-auto">
            <button type="button" class="btn btn-primary btn-sm" name="calculate" onclick="CalculationForm()">Calculate</button>
            <button type="reset" class="btn btn-outline-primary btn-sm" name="reset" value="Reset">Reset</button>
          </div>

          <div class="col-auto">
            <h6 class="display-6"> Client's 1RM is : </h6>
          </div>

          <div class="col-auto" >
            <h6 class="display-6" id="result"> </h6>
          </div>


      </form>

      <script type="text/javascript">
          function CalculationForm() {
              var weight = document.getElementById("weight").value;
              var reps = document.getElementById("reps").value;

              oneRepMax = Math.round((100 * weight) / (101.3 - (2.67123 * reps)));

              document.getElementById("result").innerHTML = oneRepMax ;
          }
      </script> 




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
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