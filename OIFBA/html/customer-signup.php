<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/OIFBA/css/style.css">
</head>
<body>

    <!-- Header Section -->
    <div class="header" id="header" style="color: white; box-shadow: 0 4px 50px rgba(0, 0, 0, 0.1);"> 
        <div class="logo" style="display: flex; align-items: center; color: black;"> 
            <img class="logo" src="/OIFBA/assets/images/logo-removebg-preview.png" alt="logo"> 
            <h1 style="padding: 30px; color: #4A6DE5;">Sign In / Sign Up</h1> 
        </div> 

        <div class="navbar"> 
            <ul> 
                <li><a href="/OIFBA/html/home.php">Home</a></li> 
                <li><a href="/OIFBA/html/product.html">Products</a></li> 
                <li><a href="/OIFBA/html/about.html">About</a></li> 
                <li><a href="#">Contact</a></li> 
                <li><a href="#">Account</a></li> 
                <img class="cart-icon" src="/OIFBA/assets/images/cart.png" width="auto" height="30px" alt="cart-icon"> 
            </ul> 
        </div> 
    </div> 

    <section class="container forms">
        <!-- Sign In Form -->
        <div class="form login">
            <div class="form-content">
                <header>Sign In</header>
                <form action="/OIFBA/html/config/login-handler.php" method="POST">
    <div class="field input-field">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" class="input" required>
    </div>
    <div class="field input-field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" class="password" required>
        <i class='bx bx-hide eye-icon'></i>
    </div>
    <div class="field input-field">
        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="customer">Customer</option>
            <option value="seller">Seller</option>
        </select>
    </div>
    <div class="form-link">
        <a href="/OIFBA/html/forgot-password.php" class="forgot-pass">Forgot password?</a>
    </div>
    <div class="field button-field">
        <button type="submit" name="signIn">Login</button>
    </div>
</form>

                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-link">Sign Up</a></span>
                </div>
            </div>
        </div>
    
        <!-- Sign Up Form for Customers Only -->
        <div class="form signup">
            <div class="form-content">
                <header>Sign Up</header>
                <form action="/OIFBA/html/config/signup-handler.php" method="POST">
    <div class="field input-field">
        <input type="text" name="fName" placeholder="First Name" class="input" required>
    </div>
    <div class="field input-field">
        <input type="text" name="lName" placeholder="Last Name" class="input" required>
    </div>
    <div class="field input-field">
        <input type="email" name="email" placeholder="Email" class="input" required>
    </div>
    <div class="field input-field">
        <input type="password" id="inputPassword" name="password" placeholder="Create Password" class="password" required>
    </div>
    <div class="field input-field">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="password" required>
        <i class='bx bx-hide eye-icon'></i>
    </div>
    <div id="passwordError" style="color: red; font-size: 12px; display: none;">Passwords do not match.</div>
    <div class="field button-field">
        <button type="submit" name="signup">Sign Up</button>
    </div>
</form>

                <div class="form-link">
                    <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>


    


    
    <script src="/OIFBA/script/script.js"></script>
</body>
</html>