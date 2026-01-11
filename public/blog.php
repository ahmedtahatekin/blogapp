<?php
require_once __DIR__ . "/../Controllers/blog_controller/view_blog.php";
global $blog;
$blog_author = User::findbyId($blog->getUserId());
$blog_authors_name = $blog_author->fullname;
?>
<!doctype html>
<html lang="tr">

<head>
    <?php
    $title = mb_convert_case($blog->title, MB_CASE_TITLE, "UTF-8");
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>

<body class="bg-light">
    <?php require_once __DIR__ . "/partials/_navbar.php"; ?>

    <div class="container my-5">
        <div class="col-lg-8 mx-auto">

            <!-- Blog Başlığı -->
            <h1 class="fw-bold mb-3"><?= mb_convert_case($blog->title, MB_CASE_TITLE, "UTF-8"); ?></h1>

            <!-- Yazar ve Tarih -->
            <div class="text-muted mb-4">
                <span>Yazar: <strong><?= $blog_authors_name; ?></strong></span> •
                <span><?= clearTime($blog->getCreatedAt()); ?></span>
            </div>

            <!-- Blog İçeriği -->
            <article class="bg-white p-4 rounded shadow-sm">
                <p>
                    <?= $blog->content; ?>
                </p>
            </article>

            <!-- Geri Dön -->
            <div class="mt-4">
                <a href="index.php" class="btn btn-outline-secondary">← Keşfete Dön</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>