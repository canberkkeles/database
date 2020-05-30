<?php
if(isset($_GET['ID'])){

   $storeid = $_GET['ID'];

   error_reporting(E_ALL ^ E_DEPRECATED);

   $link = mysqli_connect("localhost", "root", "", "cs306project");

   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }

   $check1 = mysqli_query($link,"SELECT * FROM manages WHERE storeid = '$storeid' LIMIT 1");
                
   if (!$check1) { // add this check.
       die('Invalid query: ' . mysql_error());
   }
   
   $myarr=array();
   
   while($row = mysqli_fetch_array($check1))
   {
       array_push($myarr, $row);
   }
   $number = count($myarr);
   if($number != 0){
        $mid = $myarr[0]["managerid"];
        $check2 = mysqli_query($link,"DELETE FROM manager WHERE managerid = '$mid'");
        
        if (!$check2) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
   }
   


   $check = mysqli_query($link,"DELETE FROM store WHERE storeid = '$storeid'");
       
   if (!$check) { // add this check.
       die('Invalid query: ' . mysql_error());
   }

   echo "<script>alert('Store succesfully deleted');</script>";
   echo"<script>location.assign('adminpanel_store.php')</script>";  // go back to the login page


}
?>