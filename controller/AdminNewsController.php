<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 14.07.2018
 * Time: 21:02
 */

class AdminNewsController extends AdminBase
{
    public function actionIndex()
    {

        self::checkAdmin();
        $newsList = News::getNewsListFullAdmin();

        require_once(ROOT . '/views/admin/news/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();


        if (isset($_POST['submit'])) {
            News::deleteNewsById($id);

            header("Location: /admin/novelty");
        }

        require_once(ROOT . '/views/admin/news/delete.php');
        return true;
    }

    public function actionCreate()
    {

        self::checkAdmin();
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

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }

            $code =Product::checkArticle($options['code']);

            if($code !=false)
            {
                $errors[] = 'Такой код уже есть!!!';
            }


            if ($errors == false) {

                $id = Product::createProduct($options);

                header("Location: /admin/prod");
                ob_end_flush();
            }
        }

        require_once(ROOT . '/views/admin/news/create.php');
        return true;
    }
}