<?php

if(isset($_GET['ID'])){

   $courierid = $_GET['ID'];

   error_reporting(E_ALL ^ E_DEPRECATED);

   $link = mysqli_connect("localhost", "root", "", "cs306project");

   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   $check = mysqli_query($link,"DELETE FROM courier WHERE CourierID = '$courierid'");
       
   if (!$check) { // add this check.
       die('Invalid query: ' . mysql_error());
   }

   echo "<script>alert('Courier succesfully deleted');</script>";
   echo"<script>location.assign('adminpanel_courier.php')</script>";  // go back to the login page


}
?>