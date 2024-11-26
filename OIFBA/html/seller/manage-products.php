<?php
include '/OIFBA/config/connect.php';

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);

// Output products as table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td><img src='/uploads/{$row['image']}' alt='{$row['name']}' style='width: 50px; height: 50px;'></td>
            <td>{$row['name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['stock']}</td>
            <td>
                <button class='action-btn edit-btn' onclick='editProduct({$row['id']})'>Edit</button>
                <button class='action-btn delete-btn' onclick='deleteProduct({$row['id']})'>Delete</button>
            </td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='6'>No products found</td></tr>";
}
$conn->close();
?>
