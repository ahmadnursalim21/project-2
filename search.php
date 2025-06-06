<?php

require 'database/database.php';

$keyword = '';
$result = [];
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);

    $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword'";
    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Mahasiswa</title>
</head>

<body>

    <?php include 'layouts/header.php'; ?>
    <form action="search.php" method="get">
        <div>
            <input type="text" name="keyword" placeholder="Masukan kata kunci">
            <button type="submit">Cari</button>
        </div>
    </form>

    <div>
        <?php if ($keyword !== ''): ?>
        <div>
            <h2>Hasil Pencarian untuk: <em><?php echo htmlspecialchars($keyword); ?></em></h2>

            <?php if (mysqli_num_rows($result) > 0): ?>
            <?php foreach ($result as $row): ?>
            <p>Nama: <?php echo htmlspecialchars($row['nama']); ?></p>
            <?php endforeach ?>
            <?php else: ?>
            <p>Tidak ada data ditemukan.</p>
            <?php endif ?>
        </div>
        <?php endif; ?>
    </div>

</body>

</html>