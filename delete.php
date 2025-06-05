<?php
include 'database/database.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $sql = "DELETE FROM mahasiswa WHERE nim ='$nim'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "data tidak berhasil dihapus";
    }
} else {
    echo "nim tidak ditemukan";
}