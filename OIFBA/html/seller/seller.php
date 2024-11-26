<?php
session_start(); // Start the session to access session variables
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="/OIFBA/html/seller/style.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Header Section -->
    <div class="header" id="header" style="color: white; box-shadow: 0 4px 50px rgba(0, 0, 0, 0.1);">
        <div class="logo" style="display: flex; align-items: center; color: black;">
            <img class="logo" src="/OIFBA/assets/images/logo-removebg-preview.png" alt="logo">
            <h1 style="padding: 20px; color: #4A6DE5;">Seller Dashboard</h1>
        </div>

        <div class="navbar">
            <ul>
                <li><a href="/OIFBA/html/home.html">Home</a></li>
                <li><a href="/OIFBA/html/orders.html">Orders</a></li>
                <li><a href="/OIFBA/html/add-product.html">Add Product</a></li>
                <li><a href="/OIFBA/html/seller/manage-products.html">Manage Products</a></li>
                <li><a href="/OIFBA/html/account.html">Account</a></li>
                <img class="cart-icon" src="/OIFBA/assets/images/cart.png" width="auto" height="30px" alt="cart-icon">
            </ul>
        </div>
    </div>

    <!-- Dashboard Section -->
    <section class="dashboard">
        <div class="container">
            <h2>Welcome, 
                <?php 
                // Check if the user is logged in and display their name
                if (isset($_SESSION['name'])) {
                    echo htmlspecialchars($_SESSION['name']); // Display the user's name
                } else {
                    echo "User "; // Fallback if no user is logged in
                }
                ?>!
            </h2>
            <div class="dashboard-content">
                <!-- Manage Products -->
                <div class="card">
                    <h3>Manage Products</h3>
                    <p>View and update your product listings.</p>
                    <a href="/OIFBA/html/seller/manage-products.html" class="btn">Go to Products</a>
                </div>

                <!-- Add New Product -->
                <div class="card">
                    <h3>Add New Product</h3>
                    <p>Create new product listings to sell.</p>
                    <a href="/OIFBA/html/seller/add-product.html" class="btn">Add Product</a>
                </div>

                <!-- View Orders -->
                <div class="card">
                    <h3>View Orders</h3>
                    <p>See customer orders and manage shipping.</p>
                    <a href="/OIFBA/html/seller/view-orders.html" class="btn">View Orders</a>
                </div>

                <!-- Account Settings -->
                <div class="card">
                    <h3>Account Settings</h3>
                    <p>Update your account details or log out.</p>
                    <a href="/OIFBA/html/seller/account-settings.html" class="btn">Manage Account</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer style="margin-top: 30px; text-align: center; padding: 10px; background-color: #f4f4f4;">
        <p>&copy; 2024 Seller Dashboard. All rights reserved.</p>
    </footer>

    <script src="/OIFBA/script/script.js"></script>
</body>
</html>