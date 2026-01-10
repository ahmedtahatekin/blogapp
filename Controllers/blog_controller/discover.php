<?php
require_once __DIR__ . "/../../includes/bootstrap.php";
global $conn;

Blog::setConnection($conn);
$blogs = Blog::getAllBlogs(20);
