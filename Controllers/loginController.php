<?php
session_start();
$username = $_POST['username'];
include 'site.config.php';
include_once './../Models/_redirects.php';

function login()
{
    // Get the user input from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection details
    $servername = SERVER;
    $username_db = USER;
    $password_db = PASS;
    $dbname = DBNAME;

    // Create a connection to the database
    $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query the database for the user with the given username and password
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Fetch the user data from the result
        $user = mysqli_fetch_assoc($result);

        // Store the username in a session variable
        $_SESSION['name'] = $user['username'];
        $_SESSION['fullname'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        // Redirect to the dashboard
        header("Location: ./../Views/dashboard/index.php");
    } else {
        // Redirect back to the login page with an error message
        header("Location: ./../Views/login.php?error=invalid_credentials");
    }

    // Close the database connection
    mysqli_close($conn);
}

// Call the login function
login();
