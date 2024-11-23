<?php
$conn = mysqli_connect("localhost", "root", "", "OIFBA");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$checkUser = "SELECT * FROM userr WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $checkUser);

if (mysqli_num_rows($result) > 0) {
    echo "Login successful!";
} else {
    echo "Invalid email or password.";
}

mysqli_close($conn);
?>
