<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "OIFBA");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the query
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['fName'] = $row['fName'];
        $_SESSION['lName'] = $row['lName'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on user role
        if ($row['role'] === 'seller') {
            header("Location: seller.html"); // Redirect to seller dashboard
        } else {
            header("Location: home.php"); // Redirect to customer home page
        }
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid email or password.";
}

$stmt->close();
mysqli_close($conn);
?>