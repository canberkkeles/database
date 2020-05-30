<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Information for Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</head>
<body>
    <h3 class="display-4" align = "center">Currently Available Stores</h3> <br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Store ID</th>
            <th scope="col">Store Name</th>
            <th scope="col">Store Adress</th>
            <th scope="col">Store Rating</th>
          </tr>
        </thead>
        <tbody>
            <?php
                error_reporting(E_ALL ^ E_DEPRECATED);

                $link = mysqli_connect("localhost", "root", "", "cs306project");
                
                
                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                
                $check = mysqli_query($link,"SELECT * FROM store ");
                
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
                    $id = $myarr[$i]["storeid"];
                    $name = $myarr[$i]["storename"];
                    $adress = $myarr[$i]["storeadress"];
                    $rating = $myarr[$i]["storerating"];

                    echo "<tr>";
                    echo "<th scope = 'row'>" .$id."</th>";
                    echo "<td><a href='details.php?ID={$myarr[$i]['storeid']}'>".$name."</a></td>";
                    echo "<td>".$adress. "</td>";
                    echo "<td>".$rating."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
      </table>
</body>
</html>