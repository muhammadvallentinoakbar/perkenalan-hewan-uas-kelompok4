<?php
session_start();
if (!isset($_SESSION['login'])) exit("Akses ditolak");
include '../config/koneksi.php';

$id=$_GET['id'];
$h=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM hewan WHERE id=$id"));

if (isset($_POST['update'])) {
    mysqli_query($conn,"UPDATE hewan SET
    nama='$_POST[nama]',
    habitat='$_POST[habitat]',
    makanan='$_POST[makanan]',
    deskripsi='$_POST[deskripsi]'
    WHERE id=$id");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
<h2>Edit Hewan</h2>

<form method="post">
    <input name="nama" value="<?= $h['nama']; ?>">
    <input name="habitat" value="<?= $h['habitat']; ?>">
    <input name="makanan" value="<?= $h['makanan']; ?>">
    <textarea name="deskripsi"><?= $h['deskripsi']; ?></textarea>
    <button class="btn btn-primary" name="update">Update</button>
</form>
</div>

</body>
</html>
