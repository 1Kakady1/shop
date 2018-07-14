<?php

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {

        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();

        require_once(ROOT . '/views/admin/cat/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            $errors = false;

            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                Category::createCategory($name, $sortOrder, $status);
                header("Location: /admin/cat");
            }
        }

        require_once(ROOT . '/views/admin/cat/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        self::checkAdmin();
        $category = Category::getCategoryById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            Category::updateCategoryById($id, $name, $sortOrder, $status);
            header("Location: /admin/cat");
        }


        require_once(ROOT . '/views/admin/cat/update.php');
        return true;
    }

    public function actionDelete($id)
    {

        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header("Location: /admin/cat");
        }

        require_once(ROOT . '/views/admin/cat/delete.php');
        return true;
    }

}
