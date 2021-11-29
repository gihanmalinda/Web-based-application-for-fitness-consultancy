<?php
session_start();

if(!isset($_SESSION['ClientUser']))
{
  header('Location: home.php');
}
?>




<?php
include "connection/connection.php"; // Using database connection file here

$username = $_SESSION['ClientUser'];

$records = mysqli_query($db,"SELECT nic FROM client WHERE deletion_indicator IS NULL AND client_username ='$username' "); // fetch data from database
$nic1 = mysqli_fetch_array($records);

$records = mysqli_query($db,"SELECT nic FROM client WHERE deletion_indicator IS NULL AND client_username ='$username' "); // fetch data from database
$nic2 = mysqli_fetch_array($records);


?>







<?php
include "connection/connection3.php"; // Using database connection file here

if(isset($_POST['submit']))
{  
  $client_username = $_POST["client_username"];
  $consultant = $_POST["consultant"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $status  = $_POST["status"];


    $sql = "SELECT consultant_username, appointment_date, appointment_time FROM appointment where (consultant_username = '$consultant' AND appointment_date = '$date' AND appointment_time = '$time')";

    $sqlraw = mysqli_query($conn,$sql);

    if (mysqli_num_rows($sqlraw) > 0) {
        $message = "Consultant has an appointment at that time. Please try again using another time slot... !";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    else{
           $sql2 = "INSERT INTO appointment (client_username,consultant_username,appointment_date,appointment_time,status) VALUES('$client_username','$consultant','$date','$time','$status')";
           $result = mysqli_query($conn, $sql2);

    }





   mysqli_close($conn);
}

?>













<?php 

  include "connection/connection2.php"; // Using database connection file here


  $username = $_SESSION['ClientUser'];
  $appointment_list = '';


  // getting the list of appointments
  $query = "SELECT id,consultant_username,appointment_date,appointment_time,status FROM appointment WHERE deletion_indicator IS NULL AND client_username ='$username' ORDER BY id";
  $appointments = mysqli_query($connection, $query);


  
      while ($appointment = mysqli_fetch_assoc($appointments)) {
      $appointment_list .= "<tr>";
      $appointment_list .= "<td>{$appointment['id']}</td>";
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
    <title>Client dashboard</title>
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

        <li class="nav-item">
          <a class="nav-link" href=""></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"><?php echo $_SESSION['ClientUser']; ?></a>
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



<h1 class="text-center">Welcome to Health Club Fitness</h1>
    
















<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h3 class="text-center">Client Profile</h3>
<table class="table table-striped">

<?php

include "connection/connection.php"; // Using database connection file here


$username = $_SESSION['ClientUser'];


$records = mysqli_query($db,"SELECT nic,name,dob,email,address,mobile_no FROM client WHERE deletion_indicator IS NULL AND client_username='$username' "); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
    <tr><td>NIC :</td>              <td> <?php echo $data['nic']; ?> </td></tr>
    <tr><td>Name :</td>             <td> <?php echo $data['name']; ?> </td></tr>
    <tr><td>Date of birth :</td>    <td> <?php echo $data['dob']; ?> </td></tr>
    <tr><td>Email :</td>            <td> <?php echo $data['email']; ?> </td></tr>
    <tr><td>Address :</td>          <td> <?php echo $data['address']; ?> </td></tr>
    <tr><td>Mobile no :</td>        <td> <?php echo $data['mobile_no']; ?> </td></tr>
    <tr><td></td>     <td> <a href=client_update.php?nic=<?php echo $data['nic'] ?>>Click here edit profile</a> </td></tr>
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
        <h3 class="text-center">Exercise Program</h3>
        <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->



        <table class="table table-borderless">

        <?php
        include "connection/connection.php"; // Using database connection file here


        $nic = $nic1['nic'];


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
    <div class="col">
      <div class="p-3 border bg-light">



            <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
            <h3 class="text-center">Diet Plan</h3>
            <div class="mt-4 col-md-12"></div> <!-- Margin between divs -->





            <table class="table table-borderless">

            <?php
            include "connection/connection.php"; // Using database connection file here

            $nic = $nic2['nic'];

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


































<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<h3 class="text-center">Make Appointment</h3>
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->










<div class="container px-4">

<form method="post" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center">


    <input type="hidden" name="client_username" id="client_username" value="<?php echo $_SESSION['ClientUser']; ?>">

    <div class="col-auto">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="consultant" id="consultant" required>
        <option value="">Select consultant</option>

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

    <div class="col-auto">
     <input class="form-control form-control-sm" placeholder="Date" type="date" id="somedate" name="somedate" required> 
    </div>


    <script type="text/javascript">
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("somedate")[0].setAttribute('min', today);
    </script>





    <div class="col-auto">
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="time" name="time" required>
        <option value="">Select time</option>
        <option value="6.00am - 7.00am">06.00am - 7.00am</option>
        <option value="7.00am - 8.00am">07.00am - 8.00am</option>
        <option value="8.00am - 9.00am">08.00am - 9.00am</option>
        <option value="9.00am - 10.00am">09.00am - 10.00am</option>
        <option value="10.00am - 11.00am">10.00am - 11.00am</option>
        <option value="11.00am - 12.00am">11.00am - 12.00am</option>
        <option value="12.00pm - 1.00pm">12.00pm - 1.00pm</option>
        <option value="1.00pm - 2.00pm">1.00pm - 2.00pm</option>
        <option value="2.00pm - 3.00pm">2.00pm - 3.00pm</option>
        <option value="3.00pm - 4.00pm">3.00pm - 4.00pm</option>
        <option value="4.00pm - 5.00pm">4.00pm - 5.00pm</option>
        <option value="5.00pm - 6.00pm">5.00pm - 6.00pm</option>
        <option value="6.00pm - 7.00pm">6.00pm - 7.00pm</option>
        <option value="7.00pm - 8.00pm">7.00pm - 8.00pm</option>
        <option value="8.00pm - 9.00pm">8.00pm - 9.00pm</option>
        <option value="9.00pm - 10.00pm">9.00pm - 10.00pm</option>
    </select>
    </div>


    <input type="hidden" name="status" id="status" value="pending">
    
    <div class="col-auto">
      <button class="btn btn-primary btn-sm" type="submit" name="submit" id="submit">Submit</button>
    </div>
  </form>



</div>




<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<h3 class="text-center">Appointments</h3>
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->




<div class="container-sm table-responsive px-4">

  <table class="table table-dark table-striped">

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

      <?php echo $appointment_list; ?> 
      </tbody>

  </table>

</div>








<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->
<div class="mt-4 col-md-12"></div> <!-- Margin between divs -->














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