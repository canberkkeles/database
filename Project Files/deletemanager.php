<?php
if(isset($_GET['ID'])){

   $managerid = $_GET['ID'];

   error_reporting(E_ALL ^ E_DEPRECATED);

   $link = mysqli_connect("localhost", "root", "", "cs306project");

   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   $check = mysqli_query($link,"DELETE FROM manager WHERE managerid = '$managerid'");
       
   if (!$check) { // add this check.
       die('Invalid query: ' . mysql_error());
   }

   echo "<script>alert('Manager succesfully deleted');</script>";
   echo"<script>location.assign('adminpanel_manager.php')</script>";  // go back to the login page


}
?>