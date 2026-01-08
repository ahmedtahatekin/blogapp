<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
Session::start();

$current_page = basename($_SERVER['SCRIPT_NAME']);
$is_logged_in = Auth::isLoggedIn();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">BlogApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
                <?php if (!$is_logged_in): ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Giriş yap</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Kaydol</a></li>
                
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Blog Yazılarım</a></li>
                    <li class="nav-item"><a class="nav-link" href="new_blog.php">Yeni Blog Yazısı</a></li>
                    
                    <li class="nav-item">
                        <form action="logout.php" method="post" class="d-inline">
                            <button type="submit" name="logout" class="nav-link btn btn-link" style="text-decoration: none;">
                                Çıkış Yap
                            </button>
                        </form>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>