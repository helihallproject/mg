<?php
ob_start(); //Turns on output buffering
session_start(); //Start session

$timezone = date_default_timezone_set("Australia/Sydney"); //Sets default timezone

//Connection credentials
$dbservername = "localhost";
$dbusername = "emailin";
$dbpassword = "airbusa380";
$dbdb = "humans";

//Connection variable
$con = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbdb);

if(mysqli_connect_errno()) {
	echo ("Failed to connect: " . mysqli_connect_errno());
}



?>