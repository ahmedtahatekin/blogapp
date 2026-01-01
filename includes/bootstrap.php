<?php
// tüm dosyalar için aynı başlatıcı
error_reporting(E_ALL);
ini_set('display_errors', 1);

// session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// .env
$env_path = __DIR__ . '/../.env';
if ($file_exists($env_path)) {
    $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

spl_autoload_register(function ($className) {
    $path = __DIR__ . "/../models/" . $className . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
});

require_once __DIR__ . "/db.php";