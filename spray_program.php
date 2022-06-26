<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">    
            <title>Spray program</title>
    </head>
    <body>
    <style>
            body {
                background-color: whitesmoke;
                background-image: none;
                font-family: "Lato", sans-serif;
            }

            .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #36454F;
            overflow-x: hidden;
            padding-top: 20px;
            }

            .sidenav a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            }

            .sidenav a:hover {
            color: #f1f1f1;
            }

            .main {
            margin-left: 200px; /* Same as the width of the sidenav */
            }

            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
           }
           
</style>
<div class="sidenav">
<div class="favicon" style="color: rgb(253, 253, 253);">
        <a href="index.html">
            <img src="https://www.pngfind.com/pngs/m/61-614102_agriculture-icon-png-transparent-png.png" width=50 height=auto/>AGRINFO
        </a>
    </div>
</nav><br>
<a href="#">Pest Spray program</a>
<a href="disease_spray.php">disease spray program</a>
<a href="#">fertilizer</a>
</div><br><br>

<div class="main" style="padding-left:50px">
  <!-- (A) SEARCH FORM -->
    <form method="post">
      <h1>SPRAY PROGRAM FOR TOMATOES</h1>
      <input type="text" name="search" required/>
      <input type="submit" name="searchBtn" value="Search"/>
    </form>
</div>
<div class="searchResult" style="margin-left:15%;">
    <?php
    error_reporting(0);
        if(isset($_POST['searchBtn']))
        {
            $plants = array("tomatoes"=> 1, "potatoes"=> 2, "maize"=> 3);

            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "agrinfo_db";

            $con = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

            if($con->connect_error){
                header("error.php");
                die("Connection failed: ".$con->connect_error);
            }
            // SQL QUERY
            (string) $item = $plants[$_POST['search']];
            echo $item;
            $query = "SELECT disease_name, disease_id, disease_image FROM crop_diseases
            WHERE disease_id LIKE $item;";
            echo $query;
            // FETCHING DATA FROM DATABASE
            $result = mysqli_query($con, $query); 
            if (mysqli_num_rows($result) > 0) {
                echo "success";
                echo "<table>";
                // OUTPUT DATA OF EACH ROW
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>DISEASE ID: </td>
                            <td>" . $row['disease_id']."</td>".
                        "</tr>".
                        "<tr>
                            <td>DISEASE IMAGE"."</td>
                            <td>".
                                "<img src=\"".$row['disease_image']."\" width=100 height=auto>
                            </td>
                        </tr>
                        <tr>
                            <td>DISEASE NAME: </td>
                            <td>".$row['disease_name']."</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }
    ?>
</div><hr>
<div>
    <!-- <img src="resources/maize-bacterial-wilt.png"> -->
</div>
</body>
</html> 
