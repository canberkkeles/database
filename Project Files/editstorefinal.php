<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn']) && isset($_GET['ID'])){

    $storeid = $_GET['ID'];

    $storename = $_POST['name'];
    $storerating = $_POST['rating'];

    $storeadress = $_POST['adress'];

    if($storename != ""){
        $q = mysqli_query($link,"UPDATE store SET storename= '$storename' WHERE storeid = '$storeid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }
    
    if($storerating != ""){
        $q = mysqli_query($link,"UPDATE store SET storerating= '$storerating' WHERE storeid = '$storeid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($storeadress != ""){
        $q = mysqli_query($link,"UPDATE store SET storeadress= '$storeadress' WHERE storeid = '$storeid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }
    


    echo "<script>alert('Store successfully edited!');</script>";
    echo"<script>location.assign('adminpanel_store.php')</script>";  // go back to the login page


}
?>