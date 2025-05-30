<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email address
        $to = 'stenisk34@gmail.com'; // Replace with your email address

        // Create the email subject and message
        $subject = "New Contact Form Submission from $name";
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message\n";

        // Set email headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send the message.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>
