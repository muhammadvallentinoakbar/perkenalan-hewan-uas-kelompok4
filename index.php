<?php
include 'config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM hewan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengenalan Hewan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Pengenalan Hewan</h1>

    <?php while ($h = mysqli_fetch_assoc($data)) : ?>
        <div class="card">
            <img src="img/<?= $h['gambar']; ?>" width="150"><br><br>
            <b><?= $h['nama']; ?></b><br><br>
            <a class="btn btn-primary" href="detail.php?id=<?= $h['id']; ?>">
                Lihat Detail
            </a>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
