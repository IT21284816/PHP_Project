<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/"; // Relative path to the "uploads" directory within your project
    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
        echo "File is valid, and was successfully uploaded to: " . $uploadFile;
    } else {
        echo "Upload failed.";
    }
}
?>
