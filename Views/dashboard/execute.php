<?php

// Retrieve the SQL code from the request
$request_body = file_get_contents('php://input');
$data = json_decode($request_body);

$sql = $data->sql;

// Replace with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akuma";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the SQL query
$result = $conn->query($sql);

if (!$result) {
    $response = ["error" => $conn->error];
} else {
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $response = $rows;
}

$conn->close();

// Return the response as JSON
header("Content-Type: application/json");

// JSON_ENCODE($response);
echo json_encode($response);
