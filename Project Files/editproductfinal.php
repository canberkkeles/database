<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn']) && isset($_GET['ID'])){

    $pid = $_GET['ID'];

    $brand = $_POST['brand'];
    $type = $_POST['type'];

    $quantity = $_POST['quantity'];

    $store = $_POST['storeassociated']; //name
    $supplier = $_POST['supplierassociated']; //name


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

    $check = mysqli_query($link,"SELECT * FROM supplier S WHERE S.supplierbrandname = '$supplier' LIMIT 1");

    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
    
    $myarr=array();
    
    while($row = mysqli_fetch_array($check))
    {
        array_push($myarr, $row);
    }
    $supid = $myarr[0]["supplierid"];

    if($brand != ""){
        $q = mysqli_query($link,"UPDATE productsent SET productbrand= '$brand' WHERE productid = '$pid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($type != ""){
        $q = mysqli_query($link,"UPDATE productsent SET producttype= '$type' WHERE productid = '$pid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($quantity != ""){
        $q = mysqli_query($link,"UPDATE productsent SET quantity= '$quantity' WHERE productid = '$pid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($store != ""){
        $q = mysqli_query($link,"UPDATE productsent SET storeid= '$sid' WHERE productid = '$pid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }

    if($supplier != ""){
        $q = mysqli_query($link,"UPDATE productsent SET supplierid= '$supid' WHERE productid = '$pid'");
        if (!$q) { // add this check.
            die('Invalid query: ' . mysql_error());
        }
    }


    echo "<script>alert('Product successfully edited!');</script>";
    echo"<script>location.assign('adminpanel_product.php')</script>";  // go back to the login page


}
?>