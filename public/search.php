<?php
require_once __DIR__ . "/../Controllers/blog_controller/search.php";
global $search_query;
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php
    $title = "Ara";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <h2><?= clearInput($search_query); ?> için Arama Sonuçları</h2>
            <?php if (!empty($blogs)): ?>
            <?php foreach ($blogs as $blog): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= mb_convert_case($blog['title'], MB_CASE_TITLE, "UTF-8"); ?></h5>
                            <p class="card-text"><?= clearInput(mb_substr($blog['content'], 0, 20, 'UTF-8')) . "..."; ?></p>
                            <a href="blog.php?b=<?= $blog['id']; ?>" class="btn btn-primary">Devamını Oku</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <h1 class="title title-sm">Hiçbir Sonuç Bulunamadı</h1>
            <?php endif ?>
        </div>
    </div>
</body>

</html>