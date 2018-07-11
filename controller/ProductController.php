<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 18:59
 */

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';
include_once ROOT.'/models/Comments.php';
class ProductController
{
    public $product;

    public function actionIndex($page=1)
    {

        $cat = array();
        $cat = Category::getCategoriesList();

        $catId = 0;

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts($page);

        $total= Product::getTotalProducts($page);
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    public function actionView($id)
    {

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        $name = '';
        $email = '';
        $msg= '';
        $result = false;
        $author=NULL;
        $infoPr = 0;


        if (isset($_POST['submit'])) {


            if(isset($_SESSION['user']))
            {
                $userId = $_SESSION['user'];
                $user= User::getUserById($userId);

                $name=$user['name'];
                $email=$user['email'];

                $author=1;

            } else {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $infoPr = 1;
            }

            $msg= $_POST['msg'];
            $errors = false;

            if($infoPr == 1){

                if (!Comments::checkName($name)) {
                    $errors[] = 'Имя не должно быть короче 2-х символов';
                }

                if (Comments::delErrorNameMSG($name) ==  true) {
                    $errors[] = 'Имя содержит недопустимые символы';
                }

                if (!Comments::checkEmail($email)) {
                    $errors[] = 'Неправильный email';
                }
            }

            if (!Comments::checkMSG($msg)) {
                $errors[] = 'Возможно сообщение короче 10-ти символов или содержит оскорбления и т.п.';
            }


            if ($errors == false) {
                $result = Comments::registerComments($id,$author,$name,$email,$msg);

                $name = '';
                $email = '';
                $msg= '';

            }

        }

        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $listComments = array();
        $listComments=Comments::getCommentsList($id);

        $productItem= array();
        $productItem = Product::getProductItemById($id);

        $productGallery = array();
        $productGallery = Product::getProductGalleryItemById($id);

        require_once(ROOT . '/views/product/article_product.php');
        return true;
    }

    public function actionCat($id,$page=1)
    {
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
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


        $listProdCat = array();
        $listProdCat = Product::getProductsCategoriesId($id,$page);

        $total= Product::getTotalProductsInCategory($id,$page);
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

        require_once(ROOT . '/views/product/category_id.php');
        return true;
    }


}