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

        $total= Product::getTotalProducts();
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    public function actionAjaxLoadCom()
    {
        $ajaxData = json_decode($_POST['data'], true);

        $offsetComments = Comments::getCommentsListOffset($ajaxData['id'],$ajaxData['offset']);

        echo json_encode($offsetComments, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

        return true;
    }

    public function actionSendMsg()
    {
        $name = '';
        $email = '';
        $msg= '';
        $result = false;
        $author=NULL;
        $infoPr = 0;
        $ajaxData = json_decode($_POST['data'], true);
        $id = (int)$ajaxData['id'];
            if(isset($_SESSION['user']))
            {
                $userId = $_SESSION['user'];
                $user= User::getUserById($userId);

                $name=$user['name'];
                $email=$user['email'];

                $author=1;

            } else {

                $name = htmlspecialchars($ajaxData['name']);
                $email = htmlspecialchars($ajaxData['email']);
                $infoPr = 1;
            }

        $msg = htmlspecialchars($ajaxData['msg']);
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
                $result = Comments::registerComments($id ,$author,$name,$email,$msg);

                if($result != null) {
                    $postDate = date("Y-m-d H:i:s");
                    $rezultJson = array();
                    $rezultJson[0] = true;
                    $rezultJson[1] = '<li class="wow slideInUp animated">
                            <div class="comments main_flex__nowrap">
                                <div class="img-com">
                                    <img src="https://ru.gravatar.com/avatar/055ee8ba82a2b7ee09e28bf9935dbf13?s=125" alt="c1">
                                </div>
                                <div class="msg-com">
                                    <h4>Автор: ' . $name . '<span>/ ' . $postDate . '</span></h4>
                                    <p>' . $msg . '</p>
                                </div>

                            </div>
                        </li>';
                    echo json_encode($rezultJson, JSON_FORCE_OBJECT);
                } else {

                    $errors [] = "Нет ответа от сервера. Попробуйте через время";
                    echo  json_encode($errors, JSON_FORCE_OBJECT);
                }
                $name = '';
                $email = '';
                $msg= '';

            } else { echo  json_encode($errors, JSON_FORCE_OBJECT);}

        return true;
    }

    public function actionView($id)
    {

        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }

        $result = false;

        $name = '';
        $email = '';
        $msg= '';

        $author=NULL;
        $infoPr = 0;
/*

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
*/
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
        $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT_ADMIN,'page-');

        require_once(ROOT . '/views/product/category_id.php');
        return true;
    }


}