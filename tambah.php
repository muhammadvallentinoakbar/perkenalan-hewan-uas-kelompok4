<?php
session_start();
if (!isset($_SESSION['login'])) exit("Akses ditolak");
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    $gambar = uniqid().".".
        pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../img/".$gambar);

    mysqli_query($conn,"INSERT INTO hewan VALUES
    ('','$_POST[nama]','$_POST[habitat]','$_POST[makanan]',
     '$_POST[deskripsi]','$gambar')");
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
<h2>Tambah Hewan</h2>

<form method="post" enctype="multipart/form-data">
    <input name="nama" placeholder="Nama Hewan" required>
    <input name="habitat" placeholder="Habitat" required>
    <input name="makanan" placeholder="Makanan" required>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
    <input type="file" name="gambar" required>
    <button class="btn btn-primary" name="simpan">Simpan</button>
</form>
</div>

</body>
</html>
