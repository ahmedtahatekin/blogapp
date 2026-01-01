<?php
// seçilen blogun silinmesini sağlar
// models/Blog.php modelini dahil eder
// public/dashboard.php tarafından kullanılacak

require_once __DIR__ . '/../../includes/bootstrap.php';

Blog::setConnection($conn);

$id = $_POST[''];
