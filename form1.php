<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['email'];
    $password = $_POST['pasword'];  

    // Dummy user & password
    $valid_username = 'admin';
    $valid_password = 'password123';

    $_SESSION['isAuthenticated'] = true;



    // Validate credentials
    if ($username == $valid_username && $password == $valid_password) {
        echo '<script>window.location.href = "./data.php";</script>';
    } else {
        echo '<script>alert("Login Failed")</script>';
        echo '<script>window.location.href = "./adminlogin.php";</script>';
    }
}
?>
