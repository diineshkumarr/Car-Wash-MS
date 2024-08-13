<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $to = $_POST['email'];
    $subject = "Work Complete Notification";
    $message = "Dear Customer,\n\nWe are pleased to inform you that the work has been completed.\n\nThank you.";
    $headers = "From: your_email@example.com"; // Replace with your email

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>
