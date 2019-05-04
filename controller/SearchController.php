<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 11.07.2018
 * Time: 15:04
 */

class SearchController
{

    public function actionIndex($page=1)
    {
        if(isset($_POST['s-submit']))
        {
            header('Location:/search/?p='.$_POST["search"]);
        }


        $cat = array();
        $cat = Category::getCategoriesList();
        $catId = 0;

        $latestProducts = array();
        $latestProducts = Search::getSearch($_GET['p'],$page);

        $search =nl2br(htmlspecialchars(trim($_GET['p']), ENT_QUOTES), false);

        if(empty($latestProducts))
        {
            $result = "По запросу:".$search.", найдено 0";
        } else {$result = "Резудьтат поиска по запросу:".$search; }

        require_once(ROOT . '/views/forms/search.php');
        return true;
    }

    public function actionAjaxSearch(){
        $ajaxData = json_decode($_POST['data'], true);
        $ajaxData =nl2br(htmlspecialchars(trim($ajaxData), ENT_QUOTES), false);

        $result = Search::getSearchAjax($ajaxData);

        echo  json_encode($result, JSON_FORCE_OBJECT);

        return true;

    }

}