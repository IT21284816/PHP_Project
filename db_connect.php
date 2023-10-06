<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db = "duhun";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>