<?php
$servername = "localhost";
$username = "root";
$password = "";
$mydb="musicsystem";

// Create connection
$con = mysqli_connect($servername, $username, $password,$mydb);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
?>
