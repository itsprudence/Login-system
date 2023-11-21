<?php
session_start();

include("connection.php"); // Include your database connection file
include("functions.php"); // Include your functions file

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $email = $_POST['email'];

    if (!empty($email) && is_email_valid($email)) {
        // Check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            // Generate a unique token
            $token = md5(uniqid(rand(), true));

            // Save the token in the database for the user
            $update_query = "UPDATE users SET reset_token = '$token' WHERE user_id = " . $user_data['user_id'];
            mysqli_query($conn, $update_query);

            // Send an email with a reset link containing the token
            $reset_link = "http://yourdomain.com/reset_password.php?token=$token";
            $to = $email;
            $subject = "Password Reset";
            $message = "Click the following link to reset your password: $reset_link";
            $headers = "From: your-email@example.com"; // Change this to your email address

            // Uncomment the line below to send the email (make sure your server is configured for sending emails)
            // mail($to, $subject, $message, $headers);

            // Display a success message
            echo "An email with instructions to reset your password has been sent to your email address.";
        } else {
            echo "Email not found in our records.";
        }
    } else {
        echo "Please enter a valid email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body{
            background-color: #796878;
        }
        </style>
</head>
<body>
    <h2>Forgot Password</h2>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
