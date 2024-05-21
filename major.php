<?php 
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academy";

$conn = new mysqli($servername, $username, $password, $dbname);


function addData(){ 
  $servername = "localhost";
  $DBusername = "root";
  $DBpassword = "";
  $dbname = "academy";

  // Get the input values from a form
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $conn = new mysqli($servername, $DBusername, $DBpassword, $dbname);
  
  $sql = "INSERT INTO  users (fullname, email, phone, username, password) VALUES ('$fullname', '$email', '$phone', '$username', '$password')";
  
  if (mysqli_query($conn, $sql)) {
    print ("Added Information successful!");
    header('Location: ./login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>