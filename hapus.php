<?php
session_start();
if (!isset($_SESSION['login'])) exit("Akses ditolak");

include '../config/koneksi.php';

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM hewan WHERE id=$id");

header("Location: dashboard.php");
