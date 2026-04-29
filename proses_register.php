<?php
session_start();
include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if($username == '' || $password == ''){
    $_SESSION['error'] = "Username dan password wajib diisi!";
    header("Location: register_user.php");
    exit;
}

// hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// cek username
$cek = $conn->prepare("SELECT id FROM user WHERE username=?");
$cek->bind_param("s", $username);
$cek->execute();
$cek->store_result();

if($cek->num_rows > 0){
    $_SESSION['error'] = "Username sudah digunakan!";
    header("Location: register_user.php");
    exit;
}

// simpan data
$stmt = $conn->prepare("INSERT INTO user (username,password) VALUES (?,?)");
$stmt->bind_param("ss", $username, $password_hash);
$stmt->execute();

$_SESSION['success'] = "Registrasi berhasil! Silakan login.";
header("Location: login_user.php");
exit;
