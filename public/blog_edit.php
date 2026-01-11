<!DOCTYPE html>
<html lang="tr">
<head>
    <?php
    $title = "Yazı Düzenle";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>
<body>
<div class="container mt-5">
    <h2>Blog Yazısını Düzenle</h2>
    <form method="POST" action="/controller/edit.php">
        <div class="mb-3">
            <label for="title" class="form-label">Blog Yazısı Başlığı</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">İçerik</label>
            <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
        <a href="dashboard.php" class="btn btn-secondary">Geri al</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
