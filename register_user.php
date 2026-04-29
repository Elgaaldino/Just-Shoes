<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register User</title>
<style>
body{
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg,#11998e,#38ef7d);
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
    background:#11998e;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}
button:hover{background:#0f7f76;}
.link{text-align:center;margin-top:15px;}
.error{color:red;text-align:center;}
.success{color:green;text-align:center;}
</style>
</head>

<body>
<div class="box">
    <h2>Register</h2>

    <?php
    if(isset($_SESSION['error'])){
        echo "<p class='error'>".$_SESSION['error']."</p>";
        unset($_SESSION['error']);
    }
    if(isset($_SESSION['success'])){
        echo "<p class='success'>".$_SESSION['success']."</p>";
        unset($_SESSION['success']);
    }
    ?>

    <form action="proses_register.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        Sudah punya akun? <a href="login_user.php">Login</a>
    </div>
</div>
</body>
</html>
