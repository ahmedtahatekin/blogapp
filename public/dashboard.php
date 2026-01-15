<?php
require_once __DIR__ . "/../includes/bootstrap.php";
require_once __DIR__ . "/../Controllers/blog_controller/dashboard.php";
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php
    $title = "Blog Yazılarım";
    require_once __DIR__ . "/partials/_head.php";
    ?>
</head>

<body>

    <?php require_once __DIR__ . '/partials/_navbar.php' ?>

    <div class="container mt-4">
        <h2>Blog Yazılarım</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Tarih</th>
                    <th>Olaylar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?= mb_convert_case($blog['title'], MB_CASE_TITLE, "UTF-8"); ?></td>
                        <td><?= clearTime($blog['created_at']); ?></td>
                        <td>
                            <a href="blog_edit.php" class="btn btn-sm btn-warning">Düzenle</a>
                            <a href="blog.php?b=<?= $blog['id']; ?>" class="btn btn-sm btn-primary">Görüntüle</a>
                            <form method="POST" action="/Controllers/blog_controller/blog_delete.php" class="d-inline">
                                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>