<?php
// Set the message to display
$message = "This is a redirect page. You will be redirected to the login page in a few minutes.";

// Set the URL to redirect to
$url = "./login.php";

// Set the delay time in seconds
$delay = 180;
// Display the message
echo $message;

// Use the header function to redirect after the delay
header("Location: $url");
?>

