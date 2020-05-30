<?php
session_start();
          if(!isset($_SESSION['username'])){
            echo "<script>alert('Please login to see this page!');</script>";

            echo"<script>location.assign('login_d.html')</script>";  // go back to the login page
          }
            error_reporting(E_ALL ^ E_DEPRECATED);

            $link = mysqli_connect("localhost", "root", "", "cs306project");
                       
                       
            // Check connection
            if($link === false){
               die("ERROR: Could not connect. " . mysqli_connect_error());
            }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Store</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand">Online Marketing Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="adminpanel.php">Instructions<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_manager.php">Manager</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_store.php">Store</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_supplier.php">Supplier</a>
        </li>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="adminpanel_product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_courier.php">Courier</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
    </div>
  </nav>
  <h3 class='display-4' align = 'center'>Fill the form below, leave no empty fields!</h3><hr>

  <form method = "POST" action="addstorefinal.php">
  <div class="form-group">
          <label for="storeid">Store ID</label>
          <input type="number" class="form-control" id="storeid" name = "id" placeholder="ID">
        </div>
      <div class="form-group">
          <label for="storename">Store Name</label>
          <input type="text" class="form-control" id="storename" name = "name" placeholder="Name of the store">
        </div>
        <div class="form-group">
          <label for="storeadress">Store Adress</label>
          <input type="text" class="form-control" id="storeadress" name = "adress" placeholder="Adress of the store">
        </div>
        <div class="form-group">
          <label for="storerating">Store Rating</label>
          <input type="number" class="form-control" id="storerating" name = "rating" placeholder="Rating of the store">
        </div>

        <br><br>
        <button type="submit" class="btn btn-primary btn-block btn-lg" name = "btn">Submit</button>
  </form>
</body>
</html>