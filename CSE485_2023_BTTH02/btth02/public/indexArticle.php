<?php 
    require_once('../app/config/config.php');
    require_once APP_ROOT.'/app/libs/DBConnection.php';
    require_once APP_ROOT.'/app/controllers/HomeController.php';
    require_once APP_ROOT.'/app/controllers/ArticleController.php';

    $controller = isset($_GET['controller']) ? $_GET['controller'] :'home';
    $action = isset($_GET['action']) ? $_GET['action'] :'home';
    $id = isset($_GET['ma_tloai']) ? $_GET['ma_tloai'] : null;

    $homeController = new HomeController();
    $articleController = new ArticleController();

    if ($controller == 'home') { $homeController->index(); }
    else if (isset($_POST['btn_create'])) { $articleController->store(); }
    // else if (isset($_POST['btn_update'])) { $articleController->update($id); } 
    // else if (isset($_POST['btn_delete'])) { $articleController->delete($id); } 
    else if ($controller == 'addArticle') { $articleController->add(); } 
    // else if ($controller == 'editArticle') { $articleController->edit($id); } 
    // else if ($controller == 'deleteArticle') { $articleController->destroy($id); }
    else { echo 'Nothing'; }
    