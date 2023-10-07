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
if (isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["date"]) && isset($_POST["preName"]) && isset($_POST["preNIC"]) && isset($_POST["preWhatNum"])
    && isset($_POST["preConNum"]) && isset($_POST["preEmail"]) && isset($_POST["secName"]) && isset($_POST["secNIC"]) && isset($_POST["secWhatNum"])
    && isset($_POST["secConNum"]) && isset($_POST["secEmail"]) ) {

    $name = $_POST["name"];
    $address = $_POST["address"];
    $date = $_POST["date"];
    
    $preName = $_POST["preName"];
    $preNIC = $_POST["preNIC"];
    $preWhatNum = $_POST["preWhatNum"];
    $preConNum = $_POST["preConNum"];
    $preEmail = $_POST["preEmail"];

    $secName = $_POST["secName"];
    $secNIC = $_POST["secNIC"];
    $secWhatNum = $_POST["secWhatNum"];
    $secConNum = $_POST["secConNum"];
    $secEmail = $_POST["secEmail"];

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
    $sql = "INSERT INTO db (name, address,date,preName,preNIC,preWhatNum,preConNum,preEmail,secName,secNIC,secWhatNum,secConNum,secEmail) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the SQL statement
    $stmt->bind_param("sssssssssssss", $name, $address, $date, $preName, $preNIC, $preWhatNum, $preConNum, $preEmail, $secName, $secNIC, $secWhatNum, $secConNum, $secEmail);

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
