<?php

// Database connection details
$host = "localhost";
$user = "root";
$pass = "";
$db = "OIFBA";

// Create a new connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    // It's better to use die() for terminating the script after a failed connection
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
// You can add a success message if needed for debugging purposes, but this is generally not recommended for production
// echo "Connected successfully to database";

?>
