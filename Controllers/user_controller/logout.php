<?php
require_once __DIR__ . '/../../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Auth::logout();

    header("Location: login.php");
    exit;
}
