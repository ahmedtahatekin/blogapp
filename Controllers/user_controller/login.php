<?php
// kullanıcının sisteme giriş işlemlerini yapar
// public/login.php kullanır
// models/User.php ve models/Auth.php modellerini dahil eder

require_once __DIR__ . "/../../includes/db.php";
require_once __DIR__ . "/../../models/User.php";
require_once __DIR__ . "/../../models/Auth.php";

//veri tabanı referansı oluştur
User::setConnection($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    Auth::attempt($email, $password);

    if (Auth::isLoggedIn()) {
        header('location: /');
    }
    
}

