<?php
include 'database/database.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nama, email, alamat) VALUES ('$nama', '$email', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Data tidak berhasil ditambah";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>

<body>

    <?php include "layouts/header.php" ?>
    <h1>Add data mahasiswa</h1>
    <form action="tambah.php" method="POST">
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"></textarea>
        </div>
        <div>
            <button type="submit" name="submit">Kirim</button>
        </div>
    </form>
</body>

</html>