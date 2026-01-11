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

//zamanları daha temiz göstermek üzere
function clearTime(string $date): string {
    $result = explode("-",$date);

    switch ($result[1]) {
        case '01':
            $result[1] = "Ocak";
            break;
        case '02':
            $result[1] = "Şubat";
            break;
        case '03':
            $result[1] = "Mart";
            break;
        case '04':
            $result[1] = "Nisan";
            break;
        case '05':
            $result[1] = "Mayıs";
            break;
        case '06':
            $result[1] = "Haziran";
            break;
        case '07':
            $result[1] = "Temmuz";
            break;
        case '08':
            $result[1] = "Ağustos";
            break;
        case '09':
            $result[1] = "Eylül";
            break;
        case '10':
            $result[1] = "Ekim";
            break;
        case '11':
            $result[1] = "Kasım";
            break;
        case '12':
            $result[1] = "Aralık";
            break;
    }

    $result[2] = substr($result[2], 0, 2);

    $result = $result[2] . " " . $result[1] . " " . $result[0];

    return $result;
}

require_once __DIR__ . "/db.php";

spl_autoload_register(function ($className) {
    $path = __DIR__ . "/../models/" . $className . ".php";
    if (file_exists($path)) {
        require_once $path;
    }
});
