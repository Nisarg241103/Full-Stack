<?php
// Connect to MySQL (replace 'username', 'password', and 'database' with actual credentials)
$mysqli = new mysqli("localhost", "root", "", "full_stack");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$id = $_POST['id'];
$status = $_POST['status'];

// Update status in database
$sql = "UPDATE od_attendance SET status='$status' WHERE id=$id";
if ($mysqli->query($sql) === TRUE) {
    echo "Status updated successfully.";
    // Redirect to m1.php after successful update
    header("Location: m1.php");
    exit; // Ensure that no further code is executed after redirection
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
