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
  $food1 = $_POST["food1"];
  $quantity1 = $_POST["quantity1"];
  $food2 = $_POST["food2"];
  $quantity2 = $_POST["quantity2"];
  $food3 = $_POST["food3"];
  $quantity3 = $_POST["quantity3"];
  $food4 = $_POST["food4"];
  $quantity4 = $_POST["quantity4"];
  $food5 = $_POST["food5"];
  $quantity5 = $_POST["quantity5"];
  $food6 = $_POST["food6"];
  $quantity6 = $_POST["quantity6"];
  $food7 = $_POST["food7"];
  $quantity7 = $_POST["quantity7"];
  $food8 = $_POST["food8"];
  $quantity8 = $_POST["quantity8"];
  $instruction = $_POST["instruction"];


   $sql = "INSERT INTO diet_plan (client_nic,duration,food1,quantity1,food2,quantity2,food3,quantity3,food4,quantity4,food5,quantity5,food6,quantity6,food7,quantity7,food8,quantity8,instruction) 

   VALUES('$nic','$duration','$food1','$quantity1','$food2','$quantity2','$food3','$quantity3','$food4','$quantity4','$food5','$quantity5','$food6','$quantity6','$food7','$quantity7','$food8','$quantity8','$instruction')";



   if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully !";
    $message = "New diet plan added successfully !";
    echo "<script type='text/javascript'>alert('$message');</script>";
   } 

   else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
    // $message = " Failed to add diet plan. Try again !";
    // echo "<script type='text/javascript'>alert('$message');</script>";

   }
   mysqli_close($conn);
}





?>




<?php
include "connection/connection.php"; // Using database connection file here

  $nic = $_GET['nic'];

  $records = mysqli_query($db,"SELECT weight FROM client WHERE nic='$nic';");
  $weight = mysqli_fetch_array($records);

  $records = mysqli_query($db,"SELECT height FROM client WHERE nic='$nic';");
  $height = mysqli_fetch_array($records);



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Create diet plan</title>
    <link rel = "shortcut icon" href = "image/logo/HealthClubLogo.png" type = "image/x-icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>























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







    <?php  
    $w= $weight['weight'];
    $h= $height['height'];

    $bmi = number_format((float)($w/($h*$h))*10000,2, '.', '');

     

    if ($bmi <= 18.5) {
    $output = "Under weight";
    }
    else if ($bmi > 18.5 AND $bmi<=24.9 ) {
    $output = "Normal weight";
    } 
    else if ($bmi > 24.9 AND $bmi<=29.9) {
    $output = "Over weight";
    } 
    else if ($bmi > 30.0) {
    $output = "Obese weight";
    }


    ?>  



<script type="text/javascript">
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawGauge);

    var gaugeOptions = {min: 0, max: 43.5,
      yellowFrom: 0, yellowTo: 18.5,
      redFrom: 25, redTo: 43.5,
      minorTicks: 5

};
    var gauge;

    function drawGauge() {
      gaugeData = new google.visualization.DataTable();
      gaugeData.addColumn('number', 'BMI');

      gaugeData.addRows(3);
      gaugeData.setCell(0, 0,<?php echo $bmi; ?>);


      gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
      gauge.draw(gaugeData, gaugeOptions);
    }

  </script>









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
              View last diet plan
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">


            <table class="table table-dark">

            <?php
            include "connection/connection.php"; // Using database connection file here

            $nic = $_GET['nic'];

            $records = mysqli_query($db,"SELECT duration,date_created,instruction,food1,quantity1,food2,quantity2,food3,quantity3,food4,quantity4,food5,quantity5,food6,quantity6,food7,quantity7,food8,quantity8 FROM diet_plan WHERE deletion_indicator IS NULL AND client_nic ='$nic' ORDER BY id DESC LIMIT 1 "); // fetch data from database

            while($data = mysqli_fetch_array($records))
            {
            ?>
                <tr>Duration : <?php echo$data['duration']; ?> </tr><br>
                <tr>Date created : <?php echo$data['date_created']; ?></tr><br>
                <tr>Instruction : <?php echo$data['instruction']; ?></tr><br>
                <tr><td><?php echo$data['food1']; ?></td> <td><?php echo$data['quantity1']; ?></td></tr>
                <tr><td><?php echo$data['food2']; ?></td> <td><?php echo$data['quantity2']; ?></td></tr>
                <tr><td><?php echo$data['food3']; ?></td> <td><?php echo$data['quantity3']; ?></td></tr>
                <tr><td><?php echo$data['food4']; ?></td> <td><?php echo$data['quantity4']; ?></td></tr>
                <tr><td><?php echo$data['food5']; ?></td> <td><?php echo$data['quantity5']; ?></td></tr>
                <tr><td><?php echo$data['food6']; ?></td> <td><?php echo$data['quantity6']; ?></td></tr>
                <tr><td><?php echo$data['food7']; ?></td> <td><?php echo$data['quantity7']; ?></td></tr>
                <tr><td><?php echo$data['food8']; ?></td> <td><?php echo$data['quantity8']; ?></td></tr>


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








<div class="container">

  <div class="row">
    <div class="col-8">






<form name="frmUser" method="post" action="" enctype="multipart/form-data" class="align-items-center">
  <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
  <h5 class="display-6 text-center">Create diet plan</h5>
  <?php  $nic = $_GET['nic']; ?>


  <div class="">
    <div id="gauge_div" style="width: 440px; height: 210px;"></div><br>
    <h3> Client is <?php echo "$output"; ?></h3>
  </div>






  <div class="col-auto mb-3">
  NIC :
  <label> <?php echo $nic; ?> </label>
  <input type="hidden" name="nic" value="<?php echo $nic; ?>">
  </div>


  <div class="col-auto mb-3">
    Duration
  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="duration">
    <option value="One month plan" selected>One month plan</option>
    <option value="Two month plan">Two month plan</option>
    <option value="Three month plan">Three month plan</option>
  </select>
  </div>

  Select foods and quantity  :

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food1" name="food1" required>

        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="quantity1" name="quantity1" required>
        <option value="" selected></option>
        <?php
        include "connection/connection.php"; // Using database connection file here

        $resultset = mysqli_query($db,"SELECT username FROM consultant WHERE deletion_indicator IS NULL "); // fetch data from database


        while($row = $resultset -> fetch_assoc()){
            $username = $row['username'];
            echo "<option value='$username'>$username</option>";
        }

        ?>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food2" name="food2">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity2">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food3" name="food3">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity3">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food4" name="food4">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity4">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food5" name="food5">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity5">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food6" name="food6">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity6">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food7" name="food7">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity7">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="row g-1">
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="food8" name="food8">
        <option value="" selected></option>
        <option value="Lean Beef">Lean Beef</option>
        <option value="Chicken Breast">Chicken Breast</option>
        <option value="Sweet Potato">Sweet Potato</option>
        <option value="Oatmeal">Oatmeal</option>
        <option value="Avocado">Avocado</option>
        <option value="Peanuts">Peanuts</option>
        <option value="Salmon">Salmon</option>
        <option value="Protein Supplement">Protein Supplement</option>
      </select>
    </div>
    <div class="col-auto mb-3">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity8">
        <option value="" selected></option>
        <option value="10 grams">10 grams</option>
        <option value="20 grams">20 grams</option>
        <option value="50 grams">50 grams</option>
        <option value="100 grams">100 grams</option>
        <option value="One">One</option>
        <option value="500 milli liter">500 milli liter</option>
      </select>
    </div>
  </div>

  <div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Leave a comment here" id="instruction" value="instruction" name="instruction"></textarea>
    <label for="floatingTextarea">Instructions</label>
  </div>

  <div class="col-auto mb-3">
  <button type="submit" class="btn btn-primary btn-sm" name="submit" value="submit" class="buttom">Send diet plan</button>
  </div>

</form>







    </div>
    <div class="col-4">
      
      <h1 class="display-6">Calories per 100g</h1>
      <p>
        Lean Beef- 250 calories <br>
        Chicken Breast - 165 calories <br>
        Sweet Potato - 86 calories <br>
        Oatmeal (one egg) - 68 calories <br>
        Avocado (one) - 160 calories <br>
        Peanuts - 567 calories <br>
        Salmon - 208 calories <br>
        Protein Supplement - 380 calories <br>
      </p>
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