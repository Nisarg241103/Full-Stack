<?php
// Connect to MySQL with username 'root' and no password
$mysqli = new mysqli("localhost", "root", "", "full_stack");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$enrollment_number = $_POST['enrollment_number'];
$date = $_POST['date'];

// Insert form data into database
$sql = "INSERT INTO od_forms (name, enrollment_number, date) VALUES ('$name', '$enrollment_number', '$date')";
if ($mysqli->query($sql) === TRUE) {
    echo "OD Form submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
