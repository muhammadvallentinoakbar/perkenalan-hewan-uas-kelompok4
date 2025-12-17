<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username=?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
} else {
    echo "Username atau password salah";
}
