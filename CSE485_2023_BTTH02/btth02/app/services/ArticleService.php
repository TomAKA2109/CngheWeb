<?php
require_once APP_ROOT . '/app/models/Article.php';

class ArticleService
{
    public function getAllArticles()
    {
        $articles = [];
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM articles";
                $stmt = $conn->query($sql);

                while ($row = $stmt->fetch()) {
                    $article = new Article($row['ma_tloai'], $row['ten_tloai']);
                    $articles[] = $article;
                }
                return $articles;
            }
        }
    }

    public function addArticle(Article $article)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ten_tloai = $article->getTenTheloai();
               
                $sql = "INSERT INTO articles (ten_tloai) VALUES ('$ten_tloai')";
                $conn->exec($sql);
            }
        }
    }

    public function getArticleById($ma_tloai)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "SELECT * FROM articles WHERE ma_tloai = '$ma_tloai'";
                $stmt = $conn->query($sql);
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $article = new Article($row['ma_tloai'], $row['ten_tloai'], $row['gender']);
                    return $article;
                }
            }
        }
    }

    public function updateArticle(Article $article)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $ma_tloai = $article->getMaTheLoai();
                $ten_tloai = $article->getTenTheloai();
                $sql = "UPDATE articles SET ten_tloai = '$ten_tloai' WHERE ma_tloai = '$ma_tloai'";
                $conn->exec($sql);
            }
        }
    }

    public function deleteArticle($ma_tloai)
    {
        $dbConnection = new DBConnection();

        if ($dbConnection != null) {
            $conn = $dbConnection->getConnection();

            if ($conn != null) {
                $sql = "DELETE FROM article WHERE ma_tloai = '$ma_tloai'";
                $conn->exec($sql);
            }
        }
    }
}
