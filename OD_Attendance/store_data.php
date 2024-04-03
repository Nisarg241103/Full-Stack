<?php
// Establish database connection
// Establish database connection
$servername = "localhost"; // Change if your MySQL server is hosted elsewhere
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP, usually empty
$database = "full_stack"; // Your database name
$table = "od_attendance"; // Your table name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO $table (name, enrollment, department, start_date, end_date, duration, reason) VALUES (?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssss", $name, $enrollment,$department, $start_date, $end_date, $duration, $reason);

    // Set parameters and execute
    $name = $_POST["name"];
    $enrollment = $_POST["enrollment"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $duration = $_POST["duration"];
    $reason = $_POST["reason"];
    $department = $_POST["department"];

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
echo "<script> window.location= 'od-attendance.php';</script>";
?>
