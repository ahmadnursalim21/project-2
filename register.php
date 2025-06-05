<?php
require 'database/database.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO auth (username,email, password) VALUES ('$username','$email','$hash_password')";
    if (mysqli_query($conn, $sql)) {
        echo "registrasi berhasil";
        header("Location: login.php");
    } else {
        echo "registrasi gagal";
        header("Location: register.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div>
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <button type="submit" name="submit">Register</button>
            </div>
        </form>
    </div>
</body>

</html>