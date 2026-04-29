<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login User</title>
<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg,#1e3c72,#2a5298);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}
.box{
    background:#fff;
    padding:30px;
    width:320px;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,.2);
}
h2{text-align:center;margin-bottom:20px;}
input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:5px;
    border:1px solid #ccc;
}
button{
    width:100%;
    padding:10px;
    background:#1e3c72;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
button:hover{background:#16335f;}
.link{text-align:center;margin-top:15px;}
.error{color:red;text-align:center;}
</style>
</head>

<body>
<div class="box">
    <h2>Login User</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form action="cek_login_user.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="register_user.php">Daftar</a>
    </div>
</div>
</body>
</html>
