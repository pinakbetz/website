<?php
include '/OIFBA/config/connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = $id";
    if ($conn->query($query)) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}
$conn->close();
?>
