<?php
include 'connect.php'; // Include your database connection file

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update the password in the database
    $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $update_stmt->bind_param("ss", $hashed_password, $email);

    if ($update_stmt->execute()) {
        echo "Password reset successfully.";
    } else {
        echo "Error updating password: " . $update_stmt->error;
    }

    $update_stmt->close();
}

$conn->close();
?>