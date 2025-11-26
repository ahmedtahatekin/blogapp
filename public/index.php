<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php $title = "Ana Sayfa";
        require_once '../includes/title.php' ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    
    <?php require_once 'partials/_navbar.php' ?>

    <div class="container mt-4">
        <h1 class="mb-4">Keşfet</h1>

        <form class="d-flex mb-4" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Blog ara..." name="q">
            <button class="btn btn-outline-success" type="submit">Ara</button>
        </form>

        <div class="row">
            <!-- Örnek blog kartları -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Başlığı 1</h5>
                        <p class="card-text">Bu bir örnek blog özetidir...</p>
                        <form action="blog.php" method="get">
                            <button class="btn btn-primary" type="submit" data-id="" name="b">Devamını Oku</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Başlığı 2</h5>
                        <p class="card-text">Bu bir örnek blog özetidir...</p>
                        <a href="#" class="btn btn-primary">Devamını oku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>