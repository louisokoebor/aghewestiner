<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";

    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $message = test_input($_POST["message"]);

    $message_body = "Name: $name\n";
    $message_body .= "Email: $email\n";
    $message_body .= "Phone: $phone\n";
    $message_body .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send email
    mail($to, $subject, $message_body, $headers);

    // You can redirect the user to a thank you page
    header("Location: thank_you.html");
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
