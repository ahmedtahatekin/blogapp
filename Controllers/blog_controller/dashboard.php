<?php
require_once __DIR__ . "/../../includes/bootstrap.php";
global $conn;
User::setConnection($conn);
Blog::setConnection($conn);

$blogs = Blog::getAllBlogs(0, $_SESSION['user_id']);