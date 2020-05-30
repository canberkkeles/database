<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn']) && isset($_GET['ID'])){

    $idold = $_GET['ID'];

    $name = $_POST['name'];
    $idnew = $_POST['id'];
    $rating = $_POST['rating'];
    $since = $_POST['since'];
    $store = $_POST['storemanaged']; //name

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
        $q = mysqli_query($link,"UPDATE manager SET managername= '$name' WHERE managerid = '$idold'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($rating != ""){
        $q = mysqli_query($link,"UPDATE manager SET rating= '$rating' WHERE managerid = '$idold'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($since != ""){
        $q = mysqli_query($link,"UPDATE manager SET since= '$rating' WHERE managerid = '$idold'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($store != "" && $idnew == ""){
        $q = mysqli_query($link,"UPDATE manages SET storeid= '$sid' WHERE managerid = '$idold'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }


    echo "<script>alert('Manager successfully edited!');</script>";
    echo"<script>location.assign('adminpanel_manager.php')</script>";  // go back to the login page


}
?>