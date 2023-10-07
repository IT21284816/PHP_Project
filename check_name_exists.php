<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "duhun";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the name from the AJAX request
if (isset($_POST["name"])) {
    $name = $_POST["name"];
} else {
    echo "not exists";
    exit();
}

// Check if the name already exists in the database
$query = "SELECT * FROM db WHERE name = '$name'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "exists";
} else {
    echo "not exists";
}

// Close the database connection
$conn->close();
?>
