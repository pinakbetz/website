<?php

include 'connect.php'; // Include your database connection file

if (isset($_POST['check_email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists, show the reset password form
        echo '<h1>Reset Password</h1>';
        echo '<form action="reset-password-handler.php" method="POST">';
        echo '<input type="hidden" name="email" value="' . htmlspecialchars($email) . '">';
        echo '<input type="password" name="new_password" placeholder="New Password" required>';
        echo '<input type="password" name="confirm_password" placeholder="Confirm Password" required>';
        echo '<button type="submit" name="reset_password">Reset Password</button>';
        echo '</form>';
    } else {
        echo "<p>Email not found. Please try again.</p>";
    }

    $stmt->close();
}

$conn->close();
?>