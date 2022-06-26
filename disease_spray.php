<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
include("connection.php");
$query="SELECT cd.disease_id, cd.disease_name, cd.disease_image, ds.spray_name, ds.sprayrate_per20l_water, ds.spray_interval, ds.number_of_sprays, ds.more_info  
FROM crop_diseases limit 300 AS cd 
LEFT JOIN diseasespray_info limit 300 AS ds 
ON cd.disease_id=ds.disease_id  
$result = $con->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
