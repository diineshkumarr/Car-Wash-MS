<?php
session_start();

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $password = $_POST["pasword"]; // corrected variable name
    $confirmpassword = $_POST["confrmpassword"]; // corrected variable name
    $age = $_POST["age"];
    $cmnt = $_POST["cmnt"]; // corrected variable name

    
    $_SESSION['isAuthentication'] = true;
    
    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;


    $sql = "INSERT INTO form (fullname, email, phone, birthdate, gender, pasword, confrmpassword, age, cmnt) 
            VALUES ('$fullname','$email','$phone','$birthdate','$gender','$password','$confirmpassword','$age','$cmnt')";

    if ($password === $confirmpassword && $age >= 18) {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            echo '<script>window.location.href = "./book.php";</script>';
            exit(); // Make sure no further output happens
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Display alert if passwords don't match or age is less than 18
        echo '<script>alert("Password does not match or age is less than 18");';
        echo 'window.location.href = "./RegisterForm.php";</script>';
    }

    $conn->close();
}
?>
