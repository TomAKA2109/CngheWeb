<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thể loại</title>
    <!-- thêm thư viện bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- thêm thư viện bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h3 class="text-center 
                    text-uppercase 
                    text-success 
                    mt-3 mb-3"> 
            Quản lý thể loại
        </h3>
        <a href="?controller=addArticle" class="btn btn-success ">Thêm thể loại mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên thể loại</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) { ?>
                    <tr>
                        <th scope="row"><?= $article->getMaTheLoai(); ?></th>
                        <td><?= $article->getTenTheloai(); ?></td>
                        <td>
                            <a href="?controller=editArticle&id=<?= $article->getMaTheLoai() ?>">
                            <i class="bi bi-pencil-square"></i>
                        </td>
                        <td>
                        <a href="?controller=deleteArticle&id=<?= $article->getMaTheLoai() ?>">
                        <i class="bi bi-trash"></i>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>