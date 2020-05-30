<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn'])){

    if(empty($_POST['adress']) || empty($_POST['id']) || empty($_POST['name']) || empty($_POST['rating'])){
        echo "<script>alert('You have an empty field.');</script>";

        echo"<script>location.assign('adminpanel_store.php')</script>";  // go back to the login page
    }

    $name = $_POST['name'];
    $id = $_POST['id'];
    $rating = $_POST['rating'];
    $adress = $_POST['adress'];

    if(mysqli_query($link,"INSERT INTO store(storeid,storeadress,storename,storerating) VALUES('$id','$adress','$name','$rating')")){
        echo "<script>alert('Store successfully added!');</script>";

        echo"<script>location.assign('adminpanel.php')</script>";  // go back to the login page
    }
    else{
        die('Invalid query: ' . mysql_error());
    }

}
?>