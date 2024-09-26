<?php

require_once APP_ROOT . '/app/services/CategoryService.php';

class CategoryController
{
    public function add()
    {
        include_once APP_ROOT . '/app/views/categories/add.php';
    }
    public function store()
    {
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $tomtat = $_POST['noidung'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_POST['hinhanh'];
        $category = new Category(null, $tieude,$ten_bhat,$tomtat,$ngayviet,$hinhanh);

        $categoryService = new CategoryService();
        $categoryService->addCategory($category);

        header('Location: ?controller=home');
    }
    public function edit($ma_bviet)
    {
        if (isset($ma_bviet)) {
            $categoryService = new CategoryService();
            $category = $categoryService->getCategoryById($ma_bviet);

            include APP_ROOT . '/app/views/categories/edit.php';
        } else {
            echo 'Id is null';
        }
    }
    public function update($ma_bviet)
    {
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_POST['hinhanh'];
        $category_new = new Category($ma_bviet, $tieude, $ten_bhat,$tomtat, $noidung, $ngayviet,$hinhanh );
        $categoryService = new CategoryService();
        $categoryService->updateCategory($category_new);
        header('Location: ?controller=home');
    }
    public function destroy($ma_bviet)
    {
        $categoryService = new CategoryService();
        $category = $categoryService->getCategoryById($ma_bviet);

        include APP_ROOT . '/app/views/categories/delete.php';
    }
    public function delete($ma_bviet)
    {
        $categoryService = new CategoryService();
        $categoryService->deleteCategory($ma_bviet);
        header('Location: ?controller=home');
    }
}