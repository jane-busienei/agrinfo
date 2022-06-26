<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "agrinfo_db";

$con = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

if($con->connect_error){
	header("error.php");
	die("Connection failed: ".$con->connect_error);
}
