<?php
require_once __DIR__ . "/../includes/bootstrap.php";

if (!Auth::isLoggedIn()) {
    header('location: login.php');
    exit;
}

require_once __DIR__ . "/../Controllers/blog_controller/dashboard.php";

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['delete-blog-id'])) {
    require_once __DIR__ . "/../Controllers/blog_controller/blog_delete.php";
}

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
                            <a href="blog_edit.php?b=<?= $blog['id']; ?>" class="btn btn-sm btn-warning">Düzenle</a>
                            <a href="blog.php?b=<?= $blog['id']; ?>" class="btn btn-sm btn-primary">Görüntüle</a>
                            <form method="POST" action="" class="d-inline blog-delete-form">
                                <button type="button" name="blog-delete" class="btn btn-sm btn-danger blog-delete-toggle">Sil</button>
                                <input type="hidden" name="delete-blog-id" value="<?= $blog['id']; ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const deleteButtons = document.querySelectorAll(".blog-delete-toggle");
        const blogDeleteForm = document.querySelector("#blog-delete-form");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const isConfirmed = confirm("Seçilen Blogu Silmek İstediğinize Emin Misiniz?");

                if (isConfirmed) {
                    // Tıklanan butonun içindeki en yakın formu bul ve gönder
                    this.closest(".blog-delete-form").submit();
                }
            });
        });
    </script>
</body>

</html>