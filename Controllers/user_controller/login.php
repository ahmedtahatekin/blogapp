<?php
// kullanıcının sisteme giriş işlemlerini yapar
// public/login.php kullanır
// models/User.php ve models/Auth.php modellerini dahil eder
require_once __DIR__ . '/../../includes/bootstrap.php';
User::setConnection($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = clearInput($email);
    $password = clearInput($password);

    Auth::attempt($email, $password);

    if (Auth::isLoggedIn()) {
        header('location: index.php');
        exit;
    }
    
}

