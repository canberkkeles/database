<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn'])){

    if(empty($_POST['type'])||empty($_POST['storeassociated']) || empty($_POST['id']) || empty($_POST['supplierassociated']) || empty($_POST['brand']) || empty($_POST['quantity'])){
        echo "<script>alert('You have an empty field.');</script>";

        echo"<script>location.assign('adminpanel_product.php')</script>";  // go back to the login page
    }

    $brand = $_POST['brand'];
    $pid = $_POST['id'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $supplier = $_POST['supplierassociated'];
    $store = $_POST['storeassociated']; //name

    $check = mysqli_query($link,"SELECT * FROM store WHERE storename = '$store' LIMIT 1");
                
    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
    
    $myarr=array();
    
    while($row = mysqli_fetch_array($check))
    {
        array_push($myarr, $row);
    }
    $sid = $myarr[0]["storeid"];

    $check1 = mysqli_query($link,"SELECT * FROM supplier WHERE supplierbrandname = '$supplier' LIMIT 1");
                
    if (!$check1) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
    
    $myarr1=array();
    
    while($row = mysqli_fetch_array($check1))
    {
        array_push($myarr1, $row);
    }

    $supid = $myarr1[0]["supplierid"];

    if(mysqli_query($link,"INSERT INTO productsent(productid,productbrand,producttype,quantity,supplierid,storeid) VALUES('$pid','$brand','$type','$quantity','$supid','$sid')")){
        echo "<script>alert('Product successfully added!');</script>";

        echo"<script>location.assign('adminpanel.php')</script>";  // go back to the login page
    }
    else{
        die('Invalid query: ' . mysql_error());
    }

}
?>