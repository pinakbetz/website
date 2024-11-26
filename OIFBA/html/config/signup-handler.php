<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "OIFBA");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Set the role to 'customer' automatically
    $role = 'customer';

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fName, $lName, $email, $hashedPassword, $role);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User  registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    mysqli_close($conn);
}
?>