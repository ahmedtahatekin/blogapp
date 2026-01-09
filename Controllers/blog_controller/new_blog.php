<?php
require_once __DIR__ . '/../../includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_blog_title = $_POST['title'];
    $new_blog_content = $_POST['content'];
}

// User::findByEmail();