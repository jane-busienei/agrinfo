<!DOCTYPE html>
<html>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <title>SPRAY PROGRAM</title>
    </head>
    <body>
        <style>
    body {
                background-color: whitesmoke;
                background-image: none;
                font-family: "Lato", sans-serif;
            }
</style>  
        <nav class="container-fluid navbar nav navbar-dark bg-dark">
            <div class="favicon" style="color: rgb(253, 253, 253);">
                <a href="index.html">
                    <img src="https://www.pngfind.com/pngs/m/61-614102_agriculture-icon-png-transparent-png.png" width=50 height=auto/>AGRINFO
                </a>
            </div>

            <div style="color: wheat;" style="text-align: right;">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="login.php">Login/Signup</a></li>
                    <li><a href="disease_spray.php">Disease Spray Program</a></li>
                    <li><a href="pest_spray.php">Pest Spray Program</a></li>
                    <li><a href="planting_season.php">Planting Season</a></li>
                </ul>
            </div>
        </nav><br><br><br>
<div class="main" style="padding-left:50px">
  <!-- (A) SEARCH FORM -->
    <form method="post" style="text-align:center">
      <h1>CROP DISEASE SPRAY PROGRAM</h1>
      Enter crop name:
      <input type="text" name="search" required/>
      <input type="submit" name="searchBtn" value="Search"/>
    </form>
</div><br>
<div class="searchResult" style="margin-left:5%;">
    <?php
        error_reporting(0);
        if(isset($_POST['searchBtn']))
        {
            $plant = array("tomatoes"=> 3);

            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "agrinfo_db";

            $con = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
            $searchErr = '';

            if($con->connect_error){
                header("error.php");
                die("Connection failed: ".$con->connect_error);
            }
            // SQL QUERY
            (string) $item = $plant[$_POST['search']];
            //echo $item;
            $query = "SELECT crop_id, pest_image, spray_name, sprayrate_per20l_water, spray_interval, number_of_sprays, more_info FROM pestspray_info
            WHERE crop_id = 3";
           // echo $query;
            // FETCHING DATA FROM DATABASE
            $result = mysqli_query($con, $query); 
            if (mysqli_num_rows($result) > 0) {
                //echo "success";
                echo "<table>"; 
                // OUTPUT DATA OF EACH ROW
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>CROP ID: </td>
                            <td>" . $row['crop_id']."</td>".
                        "</tr>".
                        "<tr>
                            <td>PEST IMAGE"."</td>
                            <td>".
                                "<img src=\"".$row['pest_image']."\" width=300 height=auto>
                            </td>
                        </tr>
                        <tr>
                            <td>SPRAY NAME: </td>
                            <td>".$row['spray_name']."</td>
                        </tr>
                        <tr>
                            <td>SPRAYRATE_PER20L WATER: </td>
                            <td>".$row['sprayrate_per20l_water']."</td>
                        </tr>
                        <tr>
                            <td>SRAY INTERVAL: </td>
                            <td>".$row['spray_interval']."</td>
                        </tr>
                        <tr>
                        <td>NUMBER OF SPRAYS: </td>
                        <td>".$row['number_of_sprays']."</td>
                        </tr>
                        <tr>
                        <td>MORE INFORMATION: </td>
                        <td>".$row['more_info']."</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "Please enter the information";
            }
        }
    ?>
</div><hr>
</body>
</html> 
