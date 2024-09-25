<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <script>
        function validateForm() {
            let ma_tgia = document.forms["TacGiaForm"]["ma_tgia"].value;
            let ten_tgia = document.forms["TacGiaForm"]["ten_tgia"].value;
            let hinh_tgia = document.forms["TacGiaForm"]["hinh_tgia"].value;

            if (ma_tgia === "" || ten_tgia === "" || hinh_tgia === "" ) {
                alert("Các trường trống");
                return false;
            }
            return true;
        }
    </script>
    </header>
<body>
    <form name="TacGiaForm" method="post" class="form" onsubmit="return validateForm()">
        <h2>Add Artist</h2>
        <label>Mã tác giả: <input type="text" name="ma_tgia" id=""></label>
        <label>Tên tác giả: <input type="text" name="ten_tgia"></label>
        <label>Hình tác giả: <input type="text" name="hinh_tgia"></label>
        <input type="submit" value="ADD" name="add_set">

        <?php
            if(isset($_POST['add_set'])) {
                $ma_tgia = isset($_POST['ma_tgia']) ? $_POST['ma_tgia'] : '';
                $ten_tgia = $_POST['ten_tgia'];
                $hinh_tgia = $_POST['hinh_tgia'];

                    $con = new mysqli("localhost", "root", "", "btth1_cse485");
                    if($con->connect_error){
                        die("Connection failed: " . $con->connect_error);
                    }
                    
                    // Check for duplicate mahang
                    $checkma_tgia = $con->prepare("SELECT ma_tgia FROM tacgia WHERE ma_tgia = ?");
                    $checkma_tgia->bind_param("s", $ma_tgia);
                    $checkma_tgia->execute();
                    $checkma_tgia->store_result();
                    if($checkma_tgia->num_rows > 0){
                        echo "<p style='color:red;'>This artist already exists.</p>";
                    } 

                    else {
                        // Sử dụng câu lệnh chuẩn bị để thêm bản ghi mới vào cơ sở dữ liệu
                        $stmt = $con->prepare("INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss",$ma_tgia, $ten_tgia, $hinh_tgia);

                        if($stmt->execute()){
                            echo "<script>alert('Record added successfully');</script>";
                        } else {
                            echo "Error adding record: " . $stmt->error;
                        }

                        $stmt->close();
                    }

                    $checkma_tgia->close();
                    // $checkId->close();
                    $con->close();
                }
            // }
        ?>
    </form>
</body>
</html>