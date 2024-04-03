<!DOCTYPE html>
<html>
<head>
    <title>Status Check</title>
    <style>
        .card {
            border: 1px solid black ;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        /* Styling for the button */
        .goback-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        /* Hover effect for the button */
        .goback-btn:hover {
            background-color: #fff;
            color: #0056b3;
            border: 2px solid #0056b3;
        }
    </style>
</head>
<body>
    <h2>Your Status</h2>
    <?php
    // Connect to MySQL (replace 'username', 'password', and 'database' with actual credentials)
    $mysqli = new mysqli("localhost", "root", "", "full_stack");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve enrollment number from form
    $enrollment = $_POST['enrollment'];

    // Query database for status of the provided enrollment number
    $sql = "SELECT * FROM od_attendance WHERE enrollment = '$enrollment'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Display status if enrollment number is found
        $row = $result->fetch_assoc();
        echo "<div class='card'>";
        echo "<p>Name: ".$row['name']."</p>";
        echo "<p>Enrollment Number: ".$row['enrollment']."</p>";
        echo "<p>Status: ".$row['status']."</p>";
        echo "</div>";
    } else {
        // Display message if enrollment number is not found
        echo "<p>No status found for Enrollment Number ".$enrollment.".</p>";
    }

    // Close connection
    $mysqli->close();
    ?>
    <br>
    <!-- Button styled "Go Back" link -->
    <a href="od-attendance.php" class="goback-btn">Go Back</a>
</body>
</html>
