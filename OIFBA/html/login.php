<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="/OIFBA/html/config/login-handler.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        
        <label for="role">Select Role:</label>
        <select name="role" id="role" required>
            <option value="customer">Customer</option>
            <option value="seller">Seller</option>
        </select>
        
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="customer-signup.php">Register as a Customer</a></p>
</body>
</html>