<?php

session_start();

function login()
{
    global $mysql;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $mysql->query("SELECT * FROM User WHERE Username ='$username'");
    $data = $result->fetch_all(MYSQLI_ASSOC)[0];

    if (!$data) {
        $_SESSION['error'] = 'User tidak ditemukan';
        header('location: login.php');
    } else {

        if (password_verify($password, $data['PasswordHash'])) {
            $_SESSION['success'] = 'Login berhasil';
            $_SESSION['user'] = $data;
            header('location: index.php');
        } else {
            $_SESSION['error'] = 'Password tidak sesuai';
            header('location: login.php');
        }
    }
}
