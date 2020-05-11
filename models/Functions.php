<?php

$paramsPath = ROOT.'/config/config_site.php';
$setting = include ($paramsPath);

class Functions
{

    const KEY_TOKEN = "fafa35";

    public function stripToDomainName($suri = '')
    {
        $suri = strtolower(trim($suri));

        $suri = preg_replace('%^(http:\/\/)*(www.)*%usi', '', $suri);

        $suri = preg_replace('%\/.*$%usi', '', $suri);

        return $suri;
    }

    public function token(){
        $key=self::KEY_TOKEN;
        $token = base64_encode (bin2hex(random_bytes(64)).$key);
        if (!isset($_SESSION['token'])) {
            $_SESSION['token'] = $token;
        } else {
            $token = $_SESSION['token'];
        }
        return $token;

    }

	public static function token_mobail(){
		$key=self::KEY_TOKEN;
		$token = base64_encode (bin2hex(random_bytes(64)).$key);
		if (!isset($_SESSION['token'])) {
			$_SESSION['token'] = $token;
		} else {
			$token = $_SESSION['token'];
		}
		return $token;

	}

    public function print_url_link()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            //var_dump( $_SERVER['REQUEST_URI']);
            $link_url = trim($_SERVER['REQUEST_URI'], '/');
            $buf = explode("/", $link_url);
            return $buf[0];
        }
    }

    public  static  function getTitleById($id,$tabName)
    {
        $id = intval($id);

        if($id) {
            $hTab=Db::dbTableName($tabName);
            $db= Db::getConnection();

            $result = $db->query("SELECT * FROM $hTab WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $productItem = $result->fetch();

            return $productItem;
        }
    }

	public  static  function analytic($data=[]){

    	$user_name = $data['user'];
    	$user_data= json_encode($data,JSON_UNESCAPED_UNICODE);
		$flag = false;

		if(!isset($_SESSION['tqwcht'])){
			$_SESSION['tqwcht'] = md5($user_name."busa_analytic");
			$flag = true;
		}

		if($_SESSION['tqwcht'] === md5($user_name."busa_analytic")){

			if($flag === true) {
				$hTab=Db::dbTableName('analytic');
				$db= Db::getConnection();
				$sql = 'INSERT INTO '.$hTab.' (user_name, user_data) VALUES (:user_name, :user_data)';
				$result = $db->prepare($sql);
				$result->bindParam(':user_name', $user_name, PDO::PARAM_STR);
				$result->bindParam(':user_data', $user_data, PDO::PARAM_STR);
				$result->execute();
				$res["stat_anal"] = ['add anal', false];
			} else {
				$hTab=Db::dbTableName('analytic');
				$db= Db::getConnection();
				$sql = "UPDATE $hTab SET user_data = :user_data WHERE user_name = :user_name";
				$result = $db->prepare($sql);
				$result->bindParam(':user_name', $user_name, PDO::PARAM_INT);
				$result->bindParam(':user_data', $user_data, PDO::PARAM_STR);
				$result->execute();
				$res["stat_anal"] = ['upd anal', false];
			}
		} else {
			$res['stat_anal'] = ["Кто тут читер ?",true];
		}

		return $res;
	}

    public function print_title()
    {

        $flagErr = 0;

        if (!empty($_SERVER['REQUEST_URI'])) {

            $link_url = explode('/',$_SERVER['REQUEST_URI']);
        }

        if(count($link_url)==3 && $link_url[2] != null && $link_url[1] != 'admin'){

            $bufTitle =  self::getTitleById($link_url[2],$link_url[1]);

           if($bufTitle != null){
               if(array_key_exists("title", $bufTitle)){
                   return $bufTitle['title'];
               }

               if(array_key_exists("name", $bufTitle)){
                   return $bufTitle['name'];
               }
           } else { $flagErr = 1;}


        }  else { $flagErr = 1;}


        if($flagErr == 1){
            switch ($link_url[1]) {
                case "":return 'Главная';
                case "product":return 'Товары';
                case "news":return 'Новости';
                case "user":
                    if($link_url[2] == 'login'){
                        return 'Вход';
                     } else  if($link_url[2] == 'register'){
                        return 'Регистрация';
                    } else  if($link_url[2] == 'restore'){
                        return 'Восстановить пароль';
                    } else {return 'Error title';};
                case "cabinet":return 'Ваш личный кабинет';
                case "contact":return 'Контакты';
                case "cart":return 'Корзина';
                case "admin":return 'Admin';
                case "search":return 'Поиск';
                default: return 'Error title';
            }
        }


    }

    public static function getBanner($id1,$id2,$id3)
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $sql = "SELECT * FROM $settingTab WHERE id=$id1 OR id=$id2 OR id=$id3";
        $result = $db->query($sql);
        $st=array();

        $i = 0;
        while ($row = $result->fetch()) {
            $st[$i]['id'] = $row['id'];
            $st[$i]['info'] = $row['info'];
            $i++;
        }
        return $st;
    }

    public static function getAddress()
    {
        $settingTab=Db::dbTableName('setting');
        $db = Db::getConnection();

        $sql = "SELECT * FROM $settingTab WHERE id=4 OR id=5 OR id=6 OR id=7";
        $result = $db->query($sql);
        $st=array();

        $i = 0;
        while ($row = $result->fetch()) {
            $st[$i]['id'] = $row['id'];
            $st[$i]['info'] = $row['info'];
            $i++;
        }
        return $st;
    }

}
?>