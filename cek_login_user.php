<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$username);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
    if(password_verify($password,$row['password'])){
        $_SESSION['user'] = $row['username'];
        header("Location: index.php");
        exit;
    }
}

$_SESSION['error'] = "Username atau password salah!";
header("Location: login_user.php");
exit;
