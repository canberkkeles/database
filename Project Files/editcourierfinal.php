<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn']) && isset($_GET['ID'])){

    $courierid = $_GET['ID'];

    $name = $_POST['name'];

    $vehicle = $_POST['vehicle'];

    $store = $_POST['storeassociated']; //name

    $check = mysqli_query($link,"SELECT * FROM store S WHERE S.storename = '$store' LIMIT 1");

    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
    
    $myarr=array();
    
    while($row = mysqli_fetch_array($check))
    {
        array_push($myarr, $row);
    }
    $sid = $myarr[0]["storeid"];

    if($name != ""){
        $q = mysqli_query($link,"UPDATE courier SET CourierName= '$name' WHERE CourierID = '$courierid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($vehicle != ""){
        $q = mysqli_query($link,"UPDATE courier SET CourierBrand= '$vehicle' WHERE CourierID = '$courierid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }


    if($store != ""){
        $q = mysqli_query($link,"UPDATE courier SET storeid= '$sid' WHERE CourierID = '$courierid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }


    echo "<script>alert('Courier successfully edited!');</script>";
    echo"<script>location.assign('adminpanel_courier.php')</script>";  // go back to the login page


}
?>