<?php
require_once __DIR__ . "/../Controllers/blog_controller/view_blog.php";
// $user_id = $blog['user_id'];
// $user = User::findbyId($user_id);
// echo $user->username;
// echo $blog['title'];
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog – Devamını Oku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php require_once __DIR__ . "/partials/_navbar.php"; ?>

    <div class="container my-5">
        <div class="col-lg-8 mx-auto">

            <!-- Blog Başlığı -->
            <h1 class="fw-bold mb-3">Blog Başlığı Buraya Gelecek</h1>

            <!-- Yazar ve Tarih -->
            <div class="text-muted mb-4">
                <span>Yazar: <strong>John Doe</strong></span> •
                <span>15 Kasım 2025</span>
            </div>

            <!-- Blog İçeriği -->
            <article class="bg-white p-4 rounded shadow-sm">
                <p>
                    Bu alanda blog yazısının içeriği gösterilecek. Backend tarafı
                    henüz eklenmediği için placeholder içerik bulunuyor. Blog metni
                    buraya PHP ile veritabanından çekilerek yerleştirilecektir.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Sed dignissim, nisl id lacinia hendrerit, nunc urna commodo justo,
                    in volutpat lectus libero nec ligula.
                </p>
                <p>
                    Curabitur ac ligula quis arcu posuere consequat. Etiam interdum
                    posuere massa, vitae pharetra odio convallis sed.
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