<?php
include 'database/database.php';
$nama = $email = $alamat =  "";
$nim = "";
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $sql = " SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $nama = $data["nama"];
        $email = $data["email"];
        $alamat = $data["alamat"];
        // Tampilkan data di form untuk diedit
    } else {
        echo "Query error: " . mysqli_error($conn);
    }
}


if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $nim = $_POST['nim'];
    $sql = "UPDATE mahasiswa SET nama='$nama', email='$email', alamat='$alamat' WHERE nim='$nim'";
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data mahasiswa</title>
</head>

<body>
    <?php include "layouts/header.php" ?>
    <h1>edit data mahasiswa</h1>

    <form action="edit.php" method="POST">
        <input type="hidden" name="nim" value="<?= htmlspecialchars($nim) ?>">
        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($nama) ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat"><?= htmlspecialchars($alamat) ?></textarea>
        </div>
        <div>
            <button type="submit" name="submit">Update</button>
        </div>
    </form>
</body>

</html>