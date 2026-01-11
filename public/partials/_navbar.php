<?php
require_once __DIR__ . '/../../includes/bootstrap.php';
global $conn;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['SCRIPT_NAME']);
$is_logged_in = Auth::isLoggedIn();

$user_email = $_SESSION['user_email'] ?? '';
User::setConnection($conn);
$user = User::findByEmail($user_email);

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">BlogApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'index.php' || $current_page == 'blog.php') ? 'active' : '' ?>" href="index.php">Keşfet</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                <?php if (!$is_logged_in): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'login.php' ? 'active' : '' ?>" href="login.php">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'register.php' ? 'active' : '' ?>" href="register.php">Kaydol</a>
                    </li>

                <?php else: ?>

                    <li class="nav-item me-3 text-light opacity-75 d-none d-lg-block">
                        <small><i class="fa-solid fa-user"></i> <?= htmlspecialchars($user->username) ?></small>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'dashboard.php' ? 'active' : '' ?>" href="dashboard.php">Blog Yazılarım</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $current_page == 'new_blog.php' ? 'active' : '' ?>" href="new_blog.php">Yeni Blog Yazısı</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <form action="logout.php" method="post" class="d-inline">
                            <button type="submit" name="logout" class="btn btn-outline-danger btn-sm px-3" style="text-decoration: none;">
                                Çıkış Yap
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>