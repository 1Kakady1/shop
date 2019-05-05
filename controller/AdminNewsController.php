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
            $options['title'] = $_POST['title'];
            $options['short'] = $_POST['short'];
            $options['description'] = $_POST['description'];
            $options['info'] = $_POST['aut'];

            $options['gal']=array();
            $post=array();
            $key=array('image','g1','g2','g3','g4','g5');
            for($i=0;$i<count($_FILES);$i++)
            {
                $post[$i]=$_FILES[$key[$i]]['name'];
            }


            $errors = false;

            $imageProd = Product::loadImageProd($post[0],ROOT.'/template/images/news/','image');

            if($imageProd == false)
            {
                $errors[] = 'Ошибка с изображением';
            } else {$options['image']=$imageProd;}

            for($i=1;$i<count($post);$i++)
            {
                if(isset($post[$i]))
                {
                    $imageBuf = Product::loadImageProd($post[$i],ROOT.'/template/images/news/',$key[$i]);
                    $options['gal'][$i] = $imageBuf;
                }
            }

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {

                $id = News::createNews($options);

                header("Location: /admin/novelty");
                ob_end_flush();
            }
        }

        require_once(ROOT . '/views/admin/news/create.php');
        return true;
    }

    public function actionUpdate($id)
    {

        self::checkAdmin();


         $newsList = News::getNewsItemById($id);

        $gal_list = explode(";",$newsList['gallery']);
        if($gal_list[count($gal_list)-1] == '')
        {
            array_pop($gal_list);
        }

        if (isset($_POST['submit'])) {

            ob_start();

            $options['title'] = $_POST['title'];
            $options['short'] = $_POST['short'];
            $options['description'] = $_POST['description'];
            $options['info'] = $_POST['aut'];

            $options['gal']=array();
            $post=array();
            $key=array('image','g1','g2','g3','g4','g5');

            for($i=0;$i<count($_FILES);$i++)
            {
                $post[$i]=$_FILES[$key[$i]]['name'];
            }


            $errors = false;
            if($_FILES['image']['name'] != '')
            {
                $imageProd = Product::loadImageProd($post[0],ROOT.'/template/images/news/','image');
            } else {$imageProd=$newsList['preview'];}

            for($i=1;$i<count($post);$i++)
            {
                if($post[$i] != false)
                {
                    $imageBuf = Product::loadImageProd($post[$i],ROOT.'/template/images/news/',$key[$i]);
                    $options['gal'][$i] = $imageBuf;
                }
            }

            if(empty($options['gal']))
            {
                $options['gal'] = $gal_list;
            }

            if($imageProd == false)
            {
                $errors[] = 'Ошибка с изображением';
            } else {$options['image']=$imageProd;}

            if ($errors == false) {
                News::updateNewsById($id, $options);
                header("Location: /admin/novelty");
                ob_end_flush();
            }

            ob_end_flush();
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/news/update.php');
        return true;
    }


}