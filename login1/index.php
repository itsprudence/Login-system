<?php
session_start();
include("connection.php");
include("functions.php");


$user_data = check_login($conn);

if (!$user_data) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

$_SESSION
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Website</title>
        <style>
            body {
                background-image: url(https://marketplace.canva.com/EAE727OYjxE/1/0/1600w/canva-purple-illustrated-city-desktop-wallpaper-K_G2txy0d_M.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                font-size: larger;
                font-family: 'Comic Sans';
            }
            </style>
                
        
<body>

<a href="logout.php">Logout</a>
<h1></h1>

<br>
Hello, <?php echo $user_data["username"];?>
</body>
</html>
