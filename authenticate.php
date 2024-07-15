<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'zora';
$usernae = $_POST['username'];

error_reporting(1000);
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}
$query = "SELECT `username` FROM academy.$usernae";


if($name = $con->prepare($query)) { 
$name->execute();
$name->bind_result($field1);
while ($name->fetch()) {
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['username'];
    $_SESSION['email'] = $email;
    header('Location: ./dashboard/index.php');
}
 } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }


	$name->close();
?>
