<?php
require_once APP_ROOT . '/app/models/CategoryService.php';

class PatientService
{
    public function getAllCategory()
    {
        $patients = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                // truy vấn đến toàn bộ bản ghi trong bảng patient
                $sql = "SELECT * FROM category";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    $category = new category('ma_bviet', 'tieude', 'ten_bhat', 'ma_tloai', 'tomtat', 'noidung', 'ma_tgia', 'ngayviet', 'hinhanh');
                    $categorys[] = $category;
                }
                return $categorys;
            }
        }
    }

    public function addCategory(Category $category)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ma_bviet = $category->getMaBaiViet();
                $tieude = $category->getTieuDe();
                $ten_bhat = $category->getTenBaiHat();
                $ma_tloai = $category->getMaTheLoai();
                $tomtat = $category->getTomTat();
                $noidung = $category->getNoiDung();
                $ma_tgia = $category->getMaTacGia();
                $ngayviet = $category->getNgayViet();
                $hinhanh = $category->getHinhAnh();
                $sql = "INSERT INTO category (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES ('$ma_bviet', '$tieude', '$ten_bhat', '$ma_tloai', '$tomtat', '$noidung', '$ma_tgia', '$ngayviet', '$hinhanh')";
                $conn->exec($sql);
            }
        }
    }

    public function getCategoryById($ma_bviet)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM category WHERE ma_bviet = '$ma_bviet'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $category = new Category($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
                    return $category;
                }
            }
        }
    }

    public function updateCategory(Category $category)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ma_bviet = $category->getMaBaiViet();
                $tieude = $category->getTieuDe();
                $ten_bhat = $category->getTenBaiHat();
                $ma_tloai = $category->getMaTheLoai();
                $tomtat = $category->getTomTat();
                $noidung = $category->getNoiDung();
                $ma_tgia = $category->getMaTacGia();
                $ngayviet = $category->getNgayViet();
                $hinhanh = $category->getHinhAnh();
                $sql = "UPDATE category SET ma_bviet = '$ma_bviet', tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai', tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$ma_tgia', ngayviet = '$ngayviet', hinhanh = '$hinhanh'  WHERE ma_bviet = '$ma_bviet'";
                $conn->exec($sql);
            }
        }
    }

    public function deleteCategory($ma_bviet)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "DELETE FROM category WHERE ma_bviet = '$ma_bviet'";
                $conn->exec($sql);
            }
        }
    }
}
