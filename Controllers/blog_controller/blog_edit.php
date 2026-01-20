<?php
require_once __DIR__ . "/../../includes/bootstrap.php";
global $conn;

if (!Auth::isLoggedIn()) {
    header('location: 404.php');
    exit;
}

$blog_id = $_GET['b'] ?? null;
$user_id = $_SESSION['user_id'] ?? null;

if (!isset($blog_id) || !isset($user_id) || !$_GET['b']) {
    header('location: 404.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['blog-edit-submit'])) {
    $new_blog_title = $_POST['title'];
    $new_blog_content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE blogs SET title = ?, content = ?, updated_at = NOW() WHERE id = ? AND user_id = ?");
    $stmt->execute([$new_blog_title, $new_blog_content, $blog_id, $user_id]);
}
