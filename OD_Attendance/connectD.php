<?php
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm_password']; 
    //database connection
    $conn = new mysqli('localhost','root','','full_stack');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registrationd(username, email, password, confirm_password) values(?,?,?,?)");
        $stmt->bind_param("ssss", $username,$email, $password, $confirm_password);
        $stmt->execute();
        echo "registrationd successful...";
        //redirect to home page
        echo '<script>window.location.href = "LoginD.html";</script>';
             exit();
        $stmt->close();
        $conn->close();
    }
?>