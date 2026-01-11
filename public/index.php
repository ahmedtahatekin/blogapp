<?php
require_once __DIR__ . '/../includes/bootstrap.php';
Session::start();
require_once __DIR__ . '/../Controllers/blog_controller/discover.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php
    $title = "Ana Sayfa";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>

<body>

    <?php require_once 'partials/_navbar.php' ?>

    <div class="container mt-4">
        <h1 class="mb-4">Keşfet</h1>

        <form class="d-flex mb-4" method="GET" action="search.php">
            <input class="form-control me-2" type="search" placeholder="Blog ara..." name="q">
            <button class="btn btn-outline-success" type="submit">Ara</button>
        </form>

        <div class="row">
            <!-- Örnek blog kartları -->
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>