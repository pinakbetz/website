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
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitize email
    $password = $_POST['password'];
    $role = $_POST['role']; // Get the selected role

    // Prepare the SQL query based on the role
    $query = "SELECT * FROM users WHERE email = ? AND role = ?";
    
    // Prepare and bind
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $role);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) { // Assuming password is stored securely
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['fName'] . ' ' . $user['lName']; //First and last name are stored

            // Redirect based on role
            if ($user['role'] === 'customer') {
                header("Location: /OIFBA/html/home.php");
            } else if ($user['role'] === 'seller') {
                header("Location: /OIFBA/html/seller/seller.php");
            }
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    // Close connections
    $stmt->close();
    mysqli_close($conn);
}
?>