<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . "/../Controllers/user_controller/register.php";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <?php
    $title = "Kayıt Ol";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>
<body>
<div class="container mt-5">
    <h2>Kaydol</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="fullname" class="form-label">Tam Adınız</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-posta Adresi</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Kaydol</button>
        <a href="login.php" class="btn btn-link">Giriş Yap</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>