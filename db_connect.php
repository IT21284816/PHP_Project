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

// Retrieve data from the form
if (isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["date"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $date = $_POST["date"];

} else {
    echo "Error: Name and address not provided in POST data.";
    exit();
}

// Check if the name already exists in the database
$query = "SELECT * FROM db WHERE name = '$name'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "exists";
} else {
    // Prepare an SQL statement to insert the data into the 'users' table
    $sql = "INSERT INTO db (name, address,date) VALUES (?,?, ?)";

    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the SQL statement
    $stmt->bind_param("sss", $name, $address, $date);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
