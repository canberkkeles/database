<?php
$storeid = $_GET['ID'];

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
    <title>Edit Manager</title>
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
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminpanel_courier.php">Courier</a>
        </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
    </div>
  </nav>
  <h3 class='display-4' align = 'center'>Fill the form below, empty fields will not be edited</h3><hr>

    <?php
        if(isset($_GET['ID'])){

            $managerid = $_GET['ID'];
            $check = mysqli_query($link,"SELECT * FROM manager WHERE managerid = '$managerid' LIMIT 1");
            if (!$check) { // add this check.
                die('Invalid query: ' . mysql_error());
            }
            $myarr=array();
                  
            while($row = mysqli_fetch_array($check))
            {
                 array_push($myarr, $row);
            }

            $managername = $myarr[0]["managername"];
            $managersince = $myarr[0]["since"];
            $managerrating = $myarr[0]["rating"];
            $check1 = mysqli_query($link,"SELECT * FROM store S,manages M WHERE M.managerid = '$managerid' AND M.storeid = S.storeid");
            if (!$check1) { // add this check.
                die('Invalid query: ' . mysql_error());
            }
            $myarr1=array();
                  
            while($row = mysqli_fetch_array($check1))
            {
                 array_push($myarr1, $row);
            }
            $storemanaged = $myarr1[0]["storename"];
        }
    ?>

<?php echo"<form method = 'POST' action='editmanagerfinal.php?ID={$managerid}'>"?>
<fieldset disabled>
  <div class="form-group">
          <label for="managerid">Manager ID</label>
          <?php echo "<input type='number' class='form-control' id='managerid' name = 'id' placeholder='$managerid'>" ?>
        </div>
</fieldset>
      <div class="form-group">
          <label for="managername">Manager Name</label>
          <?php echo "<input type='text' class='form-control' id='managername' name = 'name' placeholder='$managername'>" ?>
        </div>
        <div class="form-group">
          <label for="managingsince">Managing Since</label>
          <?php echo "<input type='text' class='form-control' id='managersince' name = 'since' placeholder='$managersince'>" ?>
        </div>
        <div class="form-group">
          <label for="managerrating">Manager Rating</label>
          <?php echo "<input type='number' class='form-control' id='managerrating' name = 'rating' placeholder='$managerrating'>" ?>
        </div>

        <?php

                       
            $check = mysqli_query($link,"SELECT  * FROM store S WHERE S.storeid NOT IN (SELECT M.storeid FROM manages M)");
                       
            if (!$check) { // add this check.
              die('Invalid query: ' . mysql_error());
            }
                       
            $myarr=array();
                  
           while($row = mysqli_fetch_array($check))
           {
                array_push($myarr, $row);
           }
           $row_number = count($myarr);
          echo"<label class='my-1 mr-2' for='inlineFormCustomSelectPref'>Store Managed</label>";
          echo"<select class='custom-select my-1 mr-sm-2' id='inlineFormCustomSelectPref' name = 'storemanaged'>";
          echo"<option selected>".$storemanaged."</option>";
          for($i = 0 ; $i < $row_number ; $i++){

            echo "<option>".$myarr[$i]["storename"]."</option>";

          }
          echo "</select>";
        ?>
        <br><br>
        <button type="submit" class="btn btn-primary btn-block btn-lg" name = "btn">Submit</button>
  </form>



    
</body>
</html>