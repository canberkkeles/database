<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn'])){

    if(empty($_POST['name']) || empty($_POST['id'])){
        echo "<script>alert('You have an empty field.');</script>";

        echo"<script>location.assign('adminpanel_supplier.php')</script>";  // go back to the login page
    }

    $name = $_POST['name'];
    $id = $_POST['id'];

    if(mysqli_query($link,"INSERT INTO supplier(supplierid,supplierbrandname) VALUES('$id','$name')")){
        echo "<script>alert('Supplier successfully added!');</script>";

        echo"<script>location.assign('adminpanel.php')</script>";  // go back to the login page
    }
    else{
        die('Invalid query: ' . mysql_error());
    }

}
?>