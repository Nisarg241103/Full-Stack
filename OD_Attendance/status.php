<?php
// Retrieve parameters
$id = $_GET['id'];
$status = $_GET['status'];

// Perform database update
$servername = "localhost";
$dbname = "full_stack";

// Create connection without username or password
$conn = new mysqli($servername, '', '', $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE od_attendance SET status='$status' WHERE id=$id";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}

$conn->close();
?>
