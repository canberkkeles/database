<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn']) && isset($_GET['ID'])){

    $supplierid = $_GET['ID'];

    $suppliername = $_POST['name'];

    if($suppliername != ""){
        $q = mysqli_query($link,"UPDATE supplier SET supplierbrandname= '$suppliername' WHERE supplierid = '$supplierid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }
    


    echo "<script>alert('Supplier successfully edited!');</script>";
    echo"<script>location.assign('adminpanel_supplier.php')</script>";  // go back to the login page


}
?>