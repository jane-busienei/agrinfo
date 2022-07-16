<!DOCTYPE html>
<html>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <title>planting_season</title>
    </head>
    <body>
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
        </nav><br><br>
<body>
<style>
body {
                background-color: whitesmoke;
                background-image: none;
                font-family: "Lato", sans-serif;
            }
</style>            
    <div class="container">
        <h2>
            Enter crop name to get information about it
        </h2>
        <form method="post">
            <input type="text" name="search" required />
            <input type="submit" name="phBtn" value="Search" />
        </form>
        </div>
                <footer class="container-fluid footer" id="footer">
                    <ul>
                        <li><a href="#">Contacts</a></li>
                        <li><a style="color:wheat;">© 2022 Agricultural Information System, All Rights Reserved.</a></li>
                    </ul>
                </footer>
            </div><br>
        <div class="searchResult" style="margin-left:15%;">
            <?php
            if (isset($_POST['phBtn'])) {
                // OUTPUT DATA OF EACH ROW
                $arr = array("tomatoes", "potatoes", "beans", "kales", "maize");
                for ($x = 0; $x < 5; $x++) {
                    if ($arr[$x] == strtolower($_POST['search'])) {
                        if ($arr[$x] == "tomatoes") {
                            echo "<table>";
                            echo "<tr>
                            <td>Plant Description: </td>
                            <td>" . "Tomatoes" . "</td>" .
                                "</tr>" .
                                "<tr>
                            <td>When to plant " . "</td>
                            <td>" . "Late Dec - Mid March" . "</td>
                        </tr>
                        <tr>
                            <td>Ideal PH: </td>
                            <td>" . "5.5 - 7.5" . "</td>
                        </tr>";

                            echo "</table>";
                        }
                        if ($arr[$x] == "potatoes") {
                            echo "<table>";
                            echo "<tr>
                            <td>Plant Description: </td>
                            <td>" . "Potatoes" . "</td>" .
                                "</tr>" .
                                "<tr>
                            <td>When to plant " . "</td>
                            <td>" . "Around December" . "</td>
                        </tr>
                        <tr>
                            <td>Ideal PH: </td>
                            <td>" . "6 - 6.5" . "</td>
                        </tr>";

                            echo "</table>";
                        }
                        if ($arr[$x] == "kales") {
                            echo "<table>";
                            echo "<tr>
                            <td>Plant Description: </td>
                            <td>" . "Kales" . "</td>" .
                                "</tr>" .
                                "<tr>
                            <td>When to plant " . "</td>
                            <td>" . "June  - September" . "</td>
                        </tr>
                        <tr>
                            <td>Ideal PH: </td>
                            <td>" . "6 - 7.5" . "</td>
                        </tr>";

                            echo "</table>";
                        }
                        if ($arr[$x] == "maize") {
                            echo "<table>";
                            echo "<tr>
                            <td>Plant Description: </td>
                            <td>" . "Maize" . "</td>" .
                                "</tr>" .
                                "<tr>
                            <td>When to plant " . "</td>
                            <td>" . "February - May, September - December" . "</td>
                        </tr>
                        <tr>
                            <td>Ideal PH: </td>
                            <td>" . "5.5 - 7.3" . "</td>
                        </tr>";

                            echo "</table>";
                        }
                        if ($arr[$x] == "beans") {
                            echo "<table>";
                            echo "<tr>
                            <td>Plant Description: </td>
                            <td>" . "Beans" . "</td>" .
                                "</tr>" .
                                "<tr>
                            <td>When to plant " . "</td>
                            <td>" . "June - September" . "</td>
                        </tr>
                        <tr>
                            <td>Ideal PH: </td>
                            <td>" . "6 - 7.5" . "</td>
                        </tr>";

                            echo "</table>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>