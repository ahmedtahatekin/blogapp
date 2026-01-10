<?php
require_once __DIR__ . "/../../includes/bootstrap.php";
global $conn;

$id = $_GET['b'];

Blog::setConnection($conn);
$blog = Blog::findBlogById($id);