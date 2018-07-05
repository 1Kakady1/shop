<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 07.06.2018
 * Time: 19:01
 */

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this -> routes = include($routesPath);
    }
/**
*  Return url
 */
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run()
    {
        $url = $this->getURI();

     //   ob_start();
        foreach ($this->routes as $uriPattern => $path){

            if(preg_match("~$uriPattern~", $url)){

                // определение контроллера и способа обработки

                $internalRoute = preg_replace("~$uriPattern~",$path,$url); //??????????????????

                $segments =explode('/',$internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters =$segments;

                if(count($parameters)>1){
                    $parameters[0]=$parameters[1];
                }

                      // подключение класса нужного контроллера

                $controllerFile = ROOT.'/controller/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName),$parameters); //$controllerObject->$actionName($id);
/*
                if($result == false)
                {

                    header("Location: /");
                    ob_end_flush();
снять ком строка 32
                }
*/
                if($result != null){
                    break;
                }
            }
        }


/*
        if($url == '' ){
            $controllerName='HomeController';
            $actionName='homeContent';
            $controllerFile = ROOT.'/controller/'.$controllerName.'.php';

            if(file_exists($controllerFile)){

                include_once($controllerFile);
            }

            $controllerObject = new $controllerName;
            $result = $controllerObject->$actionName();

            return $result;
        }*/
    }
}