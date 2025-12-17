<?php
$conn = mysqli_connect("localhost", "root", "", "db_hewan");
if (!$conn) {
    die("Koneksi database gagal");
}
