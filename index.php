<?php

require 'database/database.php';

$sql = "SELECT * FROM mahasiswa";

$result = mysqli_query($conn, $sql);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
</head>

<body>
    <?php include "layouts/header.php" ?>
    <h1>Data mahaasiswa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $r): ?>
            <tr>
                <td><?= $r['nim'] ?></td>
                <td><?= $r['nama'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['alamat'] ?></td>
                <td>
                    <a href="edit.php?nim=<?= htmlspecialchars($r['nim']) ?>">Edit</a>
                    <a href="delete.php?nim=<?= htmlspecialchars($r['nim']) ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>


    <?php include "layouts/footer.php" ?>

</body>

</html>