<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM hewan WHERE id=$id");
$h = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Hewan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2><?= $h['nama']; ?></h2>
    <img src="img/<?= $h['gambar']; ?>" width="250"><br><br>
    <p><?= $h['deskripsi']; ?></p>
    <p><b>Habitat:</b> <?= $h['habitat']; ?></p>
    <p><b>Makanan:</b> <?= $h['makanan']; ?></p>

    <a href="index.php" class="btn btn-secondary">Kembali</a>
</div>

</body>
</html>
