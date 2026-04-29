<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek username
$cek = $conn->prepare("SELECT id FROM user WHERE username=?");
$cek->bind_param("s",$username);
$cek->execute();
$cek->store_result();

if($cek->num_rows > 0){
    $_SESSION['error'] = "Username sudah digunakan!";
    header("Location: register_user.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO user (username,password) VALUES (?,?)");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();

$_SESSION['success'] = "Registrasi berhasil, silakan login!";
header("Location: register_user.php");
exit;
