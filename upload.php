<?php
// upload.php - lets logged-in staff upload profile documents
session_start();

$upload_dir = "uploads/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_FILES['document']['name'];
    $target = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['document']['tmp_name'], $target)) {
        echo "File uploaded successfully: " . $filename;
        echo "<a href='" . $target . "'>View file</a>";
    } else {
        echo "Upload failed.";
    }
}
?>

<form method="POST" action="upload.php" enctype="multipart/form-data">
    Select document: <input type="file" name="document"><br>
    <input type="submit" value="Upload">
</form>
