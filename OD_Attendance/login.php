<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// database connection
$conn = new mysqli('localhost', 'root', '', 'full_stack');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare('SELECT * FROM registration WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute(); 
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $username = $data['username'];
        // Checking password
        if ($data['password'] === $password) { // Change $password to $Password
            // Redirecting to USCI.html upon successful login
            $_SESSION['email'] = $email;
            $_SESSION["username"] = $username;
            // echo "<h2>Login Successful</h2>";
            echo '<script>window.location.href = "od-attendance.php";</script>';
            exit();
        } else {
            // Password doesn't match
            echo "<h2>Invalid Username or Password</h2>";
           echo '<script>window.location.href = "login.php";</script>';
            exit();
        }
        
    } else {
        // No user found with the provided email
        echo "<h2>Invalid Username or Password</h2>";
        echo '<script>window.location.href = "Login.html";</script>';
        exit();
    }
}
?>.