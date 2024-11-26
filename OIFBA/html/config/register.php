<?php

include 'connect.php';

// Check if sign up form is submitted
if (isset($_POST['signUp'])) { 
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // Password encryption (better to use bcrypt, but using md5 for now)

    // Check if email already exists
    $checkEmail = "SELECT * FROM userr WHERE email = '$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO userr (fName, lName, email, password) 
                        VALUES ('$firstName', '$lastName', '$email', '$password')";
        
        if ($conn->query($insertQuery) === TRUE) {
            // Redirect to account page
            header("Location: account.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Check if sign in form is submitted
if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // Password encryption (better to use bcrypt, but using md5 for now)

    // Validate the user credentials
    $sql = "SELECT * FROM userr WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Start session and redirect to home page
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: home.php");
        exit();
    } else {
        echo "Incorrect email or password.";
    }
}


?>
