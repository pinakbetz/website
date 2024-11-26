<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize user input
    $fname = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    
    // Check if $currentSellerId is set (e.g., from session or other means)
    // Assuming the seller's ID is stored in the session
    $currentSellerId = $_SESSION['seller_id']; // Example, adjust according to your setup

    if (empty($currentSellerId)) {
        echo "Seller ID is missing.";
        exit();
    }

    // Prepare the name field
    $name = $fname . " " . $lName;

    // If the password field is not empty, hash and update it
    $passwordQuery = $password ? ", password = '" . password_hash($password, PASSWORD_BCRYPT) . "'" : "";

    // Use prepared statement to avoid SQL injection
    $query = "UPDATE sellers SET name = ?, email = ? $passwordQuery WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        // Bind the parameters to the prepared statement
        if ($password) {
            $stmt->bind_param("sssi", $name, $email, $currentSellerId);
        } else {
            $stmt->bind_param("ssi", $name, $email, $currentSellerId);
        }

        // Execute the statement
        if ($stmt->execute()) {
            echo "Account updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
