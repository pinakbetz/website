<?php
session_start(); // Start session to access session variables
include('connect.php'); // Include your database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to OIFBA!</title>
    <link rel="stylesheet" href="/OIFBA/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header Section -->
    <div class="header" id="header">
        <div class="logo">
            <img class="logo" src="/OIFBA/assets/images/logo-removebg-preview.png" alt="logo">
        </div>

        <div class="navbar">
            <ul>
                <li><a href="/OIFBA/html/home.html">Home</a></li>
                <li><a href="/OIFBA/html/product.html">Products</a></li>
                <li><a href="/OIFBA/html/about.html">About</a></li>
                <li><a href="#">Contact</a></li>

                <?php if (isset($_SESSION['user_name'])): ?>
                    <!-- If the user is logged in, show their name and logout option -->
                    <li><a href="/OIFBA/html/account.php">Welcome, <?php echo $_SESSION['user_name']; ?></a></li>
                    <li><a href="/OIFBA/html/logout.php">Logout</a></li>
                <?php else: ?>
                    <!-- If the user is not logged in, show login and signup links -->
                    <li><a href="/OIFBA/html/login.php">Login</a></li>
                    <li><a href="/OIFBA/html/signup.php">Signup</a></li>
                <?php endif; ?>
                
                <img class="cart-icon" src="/OIFBA/assets/images/cart.png" width="auto" height="30px" alt="cart-icon">
            </ul>
        </div>
    </div>

    <!-- Cover Page  -->
    <div class="first-page">
        <h1>Welcome to <span style="color: #525e75; font-weight: bold;">OIFBA</span>!</h1>
        <p>A one stop shop for fishes. Bred and cultivated in the province of Oton, Iloilo</p>
        <div class="button">
            <button class="button">Explore Now! &#10132;</button>
        </div>
    </div>

    <!-- Featured Products  -->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="product">
            <div class="product1">
                <img src="/OIFBA/assets/images/Tilapia-1-572x360.png" alt="tilapia">
                <h4>Tilapia</h4>
                <p>Php 60.00 per kilo</p>
            </div>
            <div class="product1">
                <img src="/OIFBA/assets/images/product2-catfish.png" alt="catfish">
                <h4>Catfish(Pantat)</h4>
                <p>Php 60.00 per kilo</p>
            </div>
            <div class="product1">
                <img src="/OIFBA/assets/images/fingerlings.jpg" alt="baby-tilapia">
                <h4>Baby Tilapia Hatchlings</h4>
                <p>Php 100 per pack</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 OIFBA. All rights reserved.</p>
        <ul class="social-links">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </footer>

    <script src="/OIFBA/script/script.js"></script>
</body>
</html>
