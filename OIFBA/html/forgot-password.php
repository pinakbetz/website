<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password</h1>
    <form action="/OIFBA/html/config/forgot-password-handler.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit" name="check_email">Check Email</button>
    </form>
    <p>Remembered your password? <a href="login.php">Login</a></p>
</body>
</html>