<?php
// yeni kullanıcı kaydı yapar
// models/User.php modelini dahil eder
// public/register.php kullanır

require_once __DIR__ . "/../../includes/db.php";
//veri tabanı referansı oluştur
require_once __DIR__ . "/../../models/User.php";
User::setConnection($conn);


//kullanıcının girdiği form verilerini al
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fullname = $_POST['fullname'] ?? null;
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$fullname || !$username || !$email || !$password) {
        die("Eksik veri");
    }

    //yeni user nesnesi oluştur
    $user = new User($fullname, $username, $email, $password);
    $user->save();
}

//giriş sayfasına yönlendir
$login_dir = "login.php";
header("location: $login_dir");
