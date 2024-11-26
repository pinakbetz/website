<?php
include '/OIFBA/config/connect.php';

$query = "SELECT orders.id, customers.name AS customer_name, products.name AS product_name, orders.quantity, (orders.quantity * products.price) AS total_price, orders.status FROM orders
          JOIN customers ON orders.customer_id = customers.id
          JOIN products ON orders.product_id = products.id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['customer_name']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['total_price']}</td>
            <td>{$row['status']}</td>
        </tr>
        ";
    }
} else {
    echo "<tr><td colspan='6'>No orders found</td></tr>";
}

$conn->close();
?>
