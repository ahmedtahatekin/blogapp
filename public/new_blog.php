<?php
require_once __DIR__ .  '/../includes/bootstrap.php';

if (!Auth::isLoggedIn()) {
    header('location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    require_once __DIR__ . "/../Controllers/blog_controller/new_blog.php";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php
    $title = "Yeni Blog";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>
<body>
<div class="container mt-5">
    <h2>Yeni Blog Yazısı</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="title" class="form-label">Blog Yazısı Başlığı</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Blog Ekle</button>
        <a href="dashboard.php" class="btn btn-secondary">Bloglarım'a Geri Dön</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
