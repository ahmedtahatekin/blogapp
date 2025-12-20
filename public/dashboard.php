<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php $title = "Yazılarım";
        require_once '../includes/title.php' ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php require_once 'partials/_navbar.php' ?>

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
                <tr>
                    <td>Blog Başlığı 1</td>
                    <td>2025-11-25</td>
                    <td>
                        <a href="blog_edit.php" class="btn btn-sm btn-warning">Düzenle</a>
                        <form method="POST" action="/Controllers/blog_controller/blog_delete.php" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Blog Başlığı 2</td>
                    <td>2025-11-20</td>
                    <td>
                        <a href="blog_edit.php" class="btn btn-sm btn-warning">Düzenle</a>
                        <form method="POST" action="/Controllers/blog_controller/blog_delete.php" class="d-inline">
                            <input type="hidden" name="BlogId" value="" >
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>