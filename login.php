<?php
    session_start();
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
        if ($username == 'admin' && $password == '1234') {
            $_SESSION['user'] = $username;
            header("location:index.php");
        } else {
            echo "Sai tên đăng nhập hoặc mật khẩu";
            require "loginForm.html";
        }
?>