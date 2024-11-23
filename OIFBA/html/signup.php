<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "OIFBA");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get POST data
$fName = isset($_POST['fName']) ? mysqli_real_escape_string($conn, $_POST['fName']) : '';
$lName = isset($_POST['lName']) ? mysqli_real_escape_string($conn, $_POST['lName']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

// Validate data
if (empty($fName) || empty($lName) || empty($email) || empty($password)) {
    die("All fields are required!");
}

// Check if email already exists
$emailCheck = "SELECT * FROM userr WHERE email = '$email'";
$result = mysqli_query($conn, $emailCheck);


if (mysqli_num_rows($result) > 0) {
    // Email already exists, redirect to sign-in page with error
    header("Location: signin.php?error=email_taken");
    exit();
} else {
    // Insert into database
    $sql = "INSERT INTO userr (fName, lName, email, password) VALUES ('$fName', '$lName', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Redirect to sign-in page on success
        header("Location: signin.php?signup=success");
        exit();
    } else {
        // Handle error on insert
        echo "Error: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
