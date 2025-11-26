<?php
$servername = 'localhost';
$username = 'user_blogapp';
$password = 'blogapp_user1234?*';
$dbname = 'db_blogapp';

try {
    $conn = new PDO("mysql:host=$$servername;dbname=$dbname;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "DB Connection Failed: " . $e->getMessage();
}