<?php
// .env
$env_path = __DIR__ . '/../.env';
if (file_exists($env_path)) {
    $lines = file($env_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

if ($_ENV['APP_ENV'] === 'production') {
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../logs/php_error.log');
} elseif ($_ENV['APP_ENV'] === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//her formda veriyi temizlemek üzere
function clearInput(mixed $value): mixed {
    $value = trim($value);
    $value = htmlspecialchars($value);
    $value = stripslashes($value);

    return $value;
}

//uyarılar için
function alert(string $alert_type, string $alert_content): string {
    return "<div class='alert alert-$alert_type' role='alert' >"
        . $alert_content
        . "</div>";
}

require_once __DIR__ . "/db.php";

spl_autoload_register(function ($className) {
    $path = __DIR__ . "/../models/" . $className . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
});
