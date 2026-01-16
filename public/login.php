<?php
//eğer form submit edildiyse login controllerini dahil et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../Controllers/user_controller/login.php';
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php
    $title = "Giriş Yap";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>
<body>
<div class="container mt-5">
    <h2>Giriş Yap</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">E-posta Adresi</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Giriş Yap</button>
        <a href="register.php" class="btn btn-link">Kaydol</a>
        <a href="index.php" class="btn btn-link">Misafir Olarak Devam Et</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>