<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detailed Store Information</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    

</head>
<body>
    <?php


        
        if(isset($_GET['ID'])){

            $storeid = $_GET['ID'];

            error_reporting(E_ALL ^ E_DEPRECATED);

            $link = mysqli_connect("localhost", "root", "", "cs306project");

            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $check = mysqli_query($link,"SELECT * FROM store WHERE storeid = '$storeid' LIMIT 1");
                
            if (!$check) { // add this check.
                die('Invalid query: ' . mysql_error());
            }
            
            $myarr=array();
            
            while($row = mysqli_fetch_array($check))
            {
                array_push($myarr, $row);
            }

            $storename = $myarr[0]['storename'];

            echo "<h3 class = 'display-4' align = 'center'>".$storename."</h3><br>";

            $check = mysqli_query($link,"SELECT * FROM manages WHERE storeid = '$storeid' LIMIT 1");
                
            if (!$check) { // add this check.
                die('Invalid query: ' . mysql_error());
            }
            
            $myarr=array();
            
            while($row = mysqli_fetch_array($check))
            {
                array_push($myarr, $row);
            }

            $number = count($myarr);
            if($number == 0){
                echo "<h4 class = 'display-4' align = 'center'>Manager: Not Specified</h4>";
            }
            else{
                $managerid = $myarr[0]['managerid'];

                $check = mysqli_query($link,"SELECT * FROM manager WHERE managerid = '$managerid' LIMIT 1");
                    
                if (!$check) { // add this check.
                    die('Invalid query: ' . mysql_error());
                }
                
                $myarr=array();
                
                while($row = mysqli_fetch_array($check))
                {
                    array_push($myarr, $row);
                }

                $managername = $myarr[0]['managername'];
                echo "<h4 class = 'display-4' align = 'center'>Manager: ".$managername."</h4>";
        }
            echo "<hr>";

            echo "<h3>Products</h3><br>";
        }
    ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product Brand</th>
            <th scope = "col">Product Type</th>
            <th scope="col">Supplier</th>
            <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $chk = mysqli_query($link,"SELECT * FROM productsent WHERE storeid = '$storeid'");
                    if (!$chk) { // add this check.
                        die('Invalid query: ' . mysql_error());
                    }
                    $products = array();
                    while($row = mysqli_fetch_array($chk)){
                        array_push($products,$row);
                    }

                    $row_number =count($products);
                    for($i = 0 ; $i < $row_number ; $i++)
                    {
                        $id = $products[$i]["productid"];
                        $brand = $products[$i]["productbrand"];
                        $supplier = $products[$i]["supplierid"];
                        $type = $products[$i]["producttype"];

                        $chk2 = mysqli_query($link,"SELECT * FROM supplier WHERE supplierid = '$supplier' LIMIT 1");

                        if (!$chk2) { // add this check.
                            die('Invalid query: ' . mysql_error());
                        }
                        
                        $suppliern=array();
                        
                        while($row = mysqli_fetch_array($chk2))
                        {
                            array_push($suppliern, $row);
                        }
            
                        $suppliername = $suppliern[0]['supplierbrandname'];


                        $quantity = $products[$i]["quantity"];
    
                        echo "<tr>";
                        echo "<th scope = 'row'>" .$id."</th>";
                        echo "<td>".$brand."</td>";
                        echo "<td>".$type."</td>";
                        echo "<td>".$suppliername. "</td>";
                        echo "<td>".$quantity."</td>";
                        echo "</tr>";
                    }
                ?>
        </tbody>
    </table>
        <h3>Couriers</h3><br>
        <table class="table table-dark">
    <thead>
        <tr>
        <th scope="col">Courier ID</th>
        <th scope="col">Courier Name</th>
        <th scope="col">Courier Vehicle</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $check = mysqli_query($link,"SELECT * FROM courier WHERE storeid = '$storeid' ");
                
                if (!$check) { // add this check.
                    die('Invalid query: ' . mysql_error());
                }
                
                $myarr=array();
                
                while($row = mysqli_fetch_array($check))
                {
                    array_push($myarr, $row);
                }

                $row_number =count($myarr);
                for($i = 0 ; $i < $row_number ; $i++)
                {
                    $id = $myarr[$i]["CourierID"];
                    $name = $myarr[$i]["CourierName"];
                    $vehicle = $myarr[$i]["CourierBrand"];

                    echo "<tr>";
                    echo "<th scope = 'row'>" .$id."</th>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$vehicle."</td>";
                    echo "</tr>";
                }
        ?>
    </tbody>
</table>
</body>
</html>