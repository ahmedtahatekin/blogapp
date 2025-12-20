<?php
// yeni kullanıcı kaydı yapar
// models/User.php modelini dahil eder
// public/register.php kullanır

require_once __DIR__ . "/../../includes/db.php";
require_once __DIR__ . "/../../models/User.php";
//veri tabanı referansı oluştur
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

    if (!preg_match('/^[a-zA-Z0-9_.-]+$/', $username)) {
        die("kullanıcı adı geçersiz");
    }

    try {
        //yeni user nesnesi oluştur
        $user = new User($fullname, $username, $email, $password);
        $user->save();

        //giriş sayfasına yönlendir
        header("location: login.php");
    } catch (PDOException $e) {
        if ($e->errorInfo[1] === 1062) {
            if (str_contains($e->getMessage(), 'username')) {
                die("Bu kullanıcı adı zaten alınmış");
            } elseif (str_contains($e->getMessage(), 'email')) {
                die('Bu email zaten kayıtlı');
            }
        }
    }
}
