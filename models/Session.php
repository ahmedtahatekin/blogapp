<?php
class Session {

    //bu fonksiyon session'ı başlatır
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    //sessiona parametre ekler
    public static function set(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }
    
    //sessiondan parametre çeker
    //default parametresi eğer sessiona böyle bir veri yoksa ne döndürmesi gerektiğidir
    public static function get(string $key, mixed $default = null): mixed {
        return $_SESSION[$key] ?? $default;
    }
    
    //session var mı yok mu kontrol eder
    public static function has(string $key): bool {
        return isset($_SESSION[$key]);
    }
    
    //sessiondan bir adet parametre siler
    public static function forget(string $key): void {
        unset($_SESSION[$key]);
    }

    //tüm sessionı temizler
    public static function destroy(): void {
        session_unset();
        session_destroy();
    }
    
}