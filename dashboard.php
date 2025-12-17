<?php
session_start();
if (!isset($_SESSION['login'])) exit("Akses ditolak");

include '../config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM hewan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <h2>Dashboard Admin</h2>

    <div class="top-bar">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Hewan</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <table>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Habitat</th>
            <th>Makanan</th>
            <th>Aksi</th>
        </tr>

        <?php while ($h = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><img src="../img/<?= $h['gambar']; ?>" width="70"></td>
            <td><?= $h['nama']; ?></td>
            <td><?= $h['habitat']; ?></td>
            <td><?= $h['makanan']; ?></td>
            <td>
                <a class="btn btn-secondary" href="edit.php?id=<?= $h['id']; ?>">Edit</a>
                <a class="btn btn-danger" href="hapus.php?id=<?= $h['id']; ?>"
                   onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
