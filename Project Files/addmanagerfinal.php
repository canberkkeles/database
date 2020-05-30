<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306project");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['btn'])){

    if(empty($_POST['storemanaged']) || empty($_POST['id']) || empty($_POST['name']) || empty($_POST['rating']) || empty($_POST['since'])){
        echo "<script>alert('You have an empty field.');</script>";

        echo"<script>location.assign('adminpanel_manager.php')</script>";  // go back to the login page
    }

    $name = $_POST['name'];
    $id = $_POST['id'];
    $rating = $_POST['rating'];
    $since = $_POST['since'];
    $store = $_POST['storemanaged']; //name

    if(mysqli_query($link,"INSERT INTO manager(managerid,rating,since,managername) VALUES('$id','$rating','$since','$name')")){
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

        if(mysqli_query($link,"INSERT INTO manages(managerid,storeid) VALUES ('$id','$sid')")){
            echo "<script>alert('Manager successfully added!');</script>";

            echo"<script>location.assign('adminpanel.php')</script>";  // go back to the login page
        }
        else{
            die('Invalid query: ' . mysql_error());
        }
    }
    else{
        die('Invalid query: ' . mysql_error());
    }

}
?>