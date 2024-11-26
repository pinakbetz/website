<?php
include '/OIFBA/config/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_FILES['image'];

    // Handle image upload
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        $imagePath = basename($image['name']);

        // Insert product into database
        $query = "INSERT INTO products (name, description, price, stock, image) VALUES ('$name', '$description', '$price', '$stock', '$imagePath')";
        if ($conn->query($query)) {
            echo "Product added successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>
