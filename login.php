<?php
require 'database/database.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil data pengguna berdasarkan email
    $sql = "SELECT * FROM auth WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password']; // password hash dari database

        // Verifikasi password
        if (password_verify($password, $hashedPassword)) {
            // Login berhasil
            $_SESSION['email'] = $user['email'];
            header("Location: index.php");
            exit;
        } else {
            // Password salah
            header("Location: login.php?error=wrong_password");
            exit;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
    </div>

</body>

</html>