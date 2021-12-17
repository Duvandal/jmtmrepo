<?php
session_start();
$host     = "localhost";    // Nama host
$username = "root";         // Username database
$password = "";             // Password database
$database = "repo";         // Nama database
// Create connection
// $conn = mysqli_connect($dbservername, $dbusername, $dbpassword);
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
?>