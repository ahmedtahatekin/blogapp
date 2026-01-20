<?php
require_once __DIR__ . "/../../includes/bootstrap.php";
global $conn;

if (!isset($_GET['q'])) {
    header('location: 404.php');
    exit;
}

$search_query = $_GET['q'];
$searcy_term = "%" . $search_query . "%";

$stmt = $conn->prepare("SELECT * FROM blogs WHERE title LIKE ? OR content LIKE ?");
$stmt->execute([$searcy_term, $searcy_term]);
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
