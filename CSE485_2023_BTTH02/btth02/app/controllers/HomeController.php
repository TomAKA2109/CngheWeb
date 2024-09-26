<?php
require_once APP_ROOT . '/app/services/ArticleService.php';

class HomeController
{
    public function index()
    {
        // Initialize the service and retrieve all articles
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();

        // Include the view and make sure to pass the $articles variable
        include APP_ROOT . '/app/views/home/indexArticle.php';
    }
}