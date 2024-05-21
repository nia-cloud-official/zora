<?php
require('fpdf/fpdf.php');
	$servername='localhost';
	$username='root';
	$password='';
	$dbname = "academy";
	$conn=mysqli_connect($servername,$username,$password, $dbname);
	  if(!$conn){
		  die('Could not Connect MySql Server:' .mysql_error());
		}

		try {
			$pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
			// Set the PDO error mode to exception
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  } catch(PDOException $e) {
			// Display the connection error message
			die("Connection failed: " . $e->getMessage());
		  }

		
// Create a function to get all the courses from the database
function get_courses($pdo) {
	// Prepare the SQL statement to select all the courses
	$stmt = $pdo->prepare("SELECT * FROM courses");
	// Execute the statement
	$stmt->execute();
	// Fetch all the results as an associative array
	$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// Return the courses array
	return $courses;
  }
  function get_ucourses($pdo ,$email) {
	// Prepare the SQL statement to select all the courses
	$stmt = $pdo->prepare("SELECT * FROM orders WHERE email = $email");
	// Execute the statement
	$stmt->execute();
	// Fetch all the results as an associative array
	$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// Return the courses array
	return $courses;
  }
  
  // Create a function to get a single course by its id from the database
  function get_course($pdo, $id) {
	// Prepare the SQL statement to select the course by its id
	$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = :id");
	// Bind the id parameter to the statement
	$stmt->bindParam(':id', $id);
	// Execute the statement
	$stmt->execute();
	// Fetch the result as an associative array
	$course = $stmt->fetch(PDO::FETCH_ASSOC);
	// Return the course array
	return $course;
  }
  // Get all the user's courses

  // Define the get_item function
function get_item ($pdo, $id) {
	// Prepare the SQL statement to get the item data by its id
	$stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = :id");
	// Bind the id to the statement parameter
	$stmt->bindParam(':id', $id);
	// Execute the statement
	$stmt->execute();
	// Fetch the item data as an associative array
	$item = $stmt->fetch(PDO::FETCH_ASSOC);
	// Return the item data
	return $item;
  }  
  function get_allcourses($pdo) {
	$email = $_SESSION['email'];

	$sql = "SELECT order_id, name, image_url FROM orders WHERE email = :email";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
// Define your custom function to write HTML content
  ?>