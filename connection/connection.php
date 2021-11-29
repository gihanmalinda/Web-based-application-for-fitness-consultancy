<?php

$db = mysqli_connect("localhost","root","","health_club_fitness");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>