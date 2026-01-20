<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
global $conn;

$delete_blog_id = $_POST['delete-blog-id'];

$stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
$stmt->execute([$delete_blog_id]);
