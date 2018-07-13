<?php

class AdminProductController extends AdminBase
{

    public function actionIndex($page=1)
    {

        if(isset($_POST['b-search']))
        {
            header('Location:/admin/search/?p='.$_POST["search"]);exit;
        }

        if(isset($_POST['sort']))
        {
             header('Location:/admin/prod/cat/'.$_POST['cat-id']);exit;

        }


        self::checkAdmin();

        $catId=666;

        $productsList =array();
        $productsList = Product::getProductsList($page);

        $total= Product::getTotalProducts();
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT_ADMIN,'page-');

        $cat=array();
        $cat=Category::getCategoriesList();

        require_once(ROOT . '/views/admin/product/index.php');
        return true;
    }

    public function actionCat($id,$page=1)
    {

        if(isset($_POST['sort']))
        {
            header('Location:/admin/prod/cat/'.$_POST['cat-id']);exit;

        }

        $cat = array();
        $cat = Category::getCategoriesList();

        for ($i=0;$i<count($cat);$i++)
        {
            if($cat[$i]['id'] == $id ){
                $catName = $cat[$i]['name'];
                $catId = $cat[$i]['id'];
                break;
            }
        }

        $productsList = array();
        $productsList = Product::getProductsCategoriesId($id,$page);

        $total= Product::getTotalProductsInCategory($id);
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT_ADMIN,'page-');

        require_once(ROOT . '/views/admin/product/index.php');
        return true;

    }

    public function actionCreate()
    {

        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            ob_start();
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $options['description'] = $_POST['description'];
            $options['info'] = $_POST['info'];


            $options['gal']=array();
            $post=array();
            $key=array('image','g1','g2','g3','g4','g5');
            for($i=0;$i<count($_FILES);$i++)
            {
                $post[$i]=$_FILES[$key[$i]]['name'];
            }


            $errors = false;

            $imageProd = Product::loadImageProd($post[0],ROOT.'/template/images/shop/','image');

            if($imageProd == false)
            {
                $errors[] = 'Ошибка с изображением';
            } else {$options['image']=$imageProd;}

            for($i=1;$i<count($post);$i++)
            {
                if(isset($post[$i]))
                {
                    $imageBuf = Product::loadImageProd($post[$i],ROOT.'/template/images/shop/',$key[$i]);
                    $options['gal'][$i] = $imageBuf;
                }
            }
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            //сделать проверку артикла

            if ($errors == false) {

                $id = Product::createProduct($options);

                header("Location: /admin/prod");
                ob_end_flush();
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/product/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();

        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/product/update.php');
        return true;
    }


    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();


        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);

            header("Location: /admin/prod");
        }

        require_once(ROOT . '/views/admin/product/delete.php');
        return true;
    }

}
