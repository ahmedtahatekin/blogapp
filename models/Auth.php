<?php

require_once "Session.php";
require_once "User.php";
class Auth {
    
    public function attempt(string $email, string $password): bool {

        //user nesnesini tanımla
        $user = User::findByEmail($email);

        //kullanıcı var mı yok mu diye kontrol et
        if (!$user) {
            return false;
        }

        //şifre doğrulaması yap
        if (!password_verify($password, $user->password)) {
            return false;
        }

        //buraya kadar geldiyse kullanıcı var ve şifre doğru demektir
        //kullanıcıyı sessiona ekle
        Session::start();
        Session::set('user_id', $user->id);
        return true;
        
    }

}