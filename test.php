<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $fullname =  $_POST['fullname'];
    $email = $_POST['email'];

    // Query to check if fullname and email exist in the form table
    $query = "SELECT * FROM form WHERE fullname = '$fullname' AND email = '$email'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {

        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $number = $_POST["number"];
        $vehiclename = $_POST["vehiclename"];
        $book = $_POST["book"];

        
        //inserting into 'book' table
        $insert_query = "INSERT INTO book (fullname, email, phone, number, vehiclename, book) 
                         VALUES ('$fullname', '$email', '$phone', '$number', '$vehiclename', '$book')";
        
        if (mysqli_query($conn, $insert_query)) {
            echo '<script>window.location.href = "status.php";</script>';
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Invalid user details
         echo '<script>alert("Invalid user details. Please check your Full Name and Email")</script>';
         echo '<script>window.location.href = "./RegisterForm.php";</script>';
    }

    mysqli_free_result($result);
    $conn->close();
}
?>
