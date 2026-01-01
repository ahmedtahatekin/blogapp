<?php
require_once __DIR__ . '/../includes/bootstrap.php';
class Auth {
    
    public static function attempt(string $email, string $password): bool {

        //user nesnesini tanımla
        $user = User::findByEmail($email);

        //kullanıcı var mı yok mu diye kontrol et
        if (!$user) {
            return false;
        }

        //şifre doğrulaması yap
        if (!password_verify($password, $user->getHashedPassword())) {
            return false;
        }

        //buraya kadar geldiyse kullanıcı var ve şifre doğru demektir
        //kullanıcıyı sessiona ekle
        Session::start();
        Session::set('user_id', $user->getId());
        return true;
        
    }

    public static function isLoggedIn(): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

}