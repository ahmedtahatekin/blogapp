<?php require_once __DIR__ . '/../../models/Auth.php' ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">BlogApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php'): ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Giriş yap</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Kaydol</a></li>
                <?php elseif ($_SERVER['SCRIPT_NAME'] === '/dashboard.php'): ?>
                    <li class="nav-item"><a class="nav-link" href="new_blog.php">Yeni Blog Yazısı</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Çıkış Yap</a></li>
                <?php elseif (Auth::isLoggedIn()): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Blog Yazılarım</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="new_blog.php">Yeni Blog Yazısı</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="login.php">Çıkış Yap</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>