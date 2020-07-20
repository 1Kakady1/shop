<?php


class ApiController
{

	const KEY_API = "key";
	const KEY_API_ANALYTIC = "key_Analytic";

	public function actionCaptcha(){
		Functions::captcha();

		return true;
	}

	public function actionGetToken(){
		$token = Functions::token_mobail();
		//$token = "sdawsdawd";
		echo json_encode($token,JSON_UNESCAPED_UNICODE);
		return true;
	}

	public function actionGetProduct()
	{
		$key_api = $_POST['key'];
		$id =  $_POST['id'];
		$_token = json_decode($_POST['_token']);

		if($key_api === self::KEY_API && $_token == $_SESSION['token']){
			$response = Product::getProductItemById($id);
			echo json_encode($response,JSON_UNESCAPED_UNICODE);
		} else{
			echo json_encode(['error'=>'error'],JSON_UNESCAPED_UNICODE);
		}

		return true;
	}

	public function actionGetApiTest()
	{

		//header('Access-Control-Allow-Origin: *');
		//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		//header('Access-Control-Allow-Headers: Content-Type');

		$response['data']['status'] = 1;
		$response['data']['data'] = [
			"awddwawdaw",
			"dwadwadawdw"
		];
		echo json_encode($response,JSON_UNESCAPED_UNICODE);
		return true;
	}

	public function actionGetLastProducts()
	{
		$key_api = $_POST['key'];
		$offset =  $_POST['offset'];
		$limit = $_POST['limit'];
		$_token = json_decode($_POST['_token']);

		if($key_api === self::KEY_API && $_token == $_SESSION['token']){
			$catList  = Category::getCategoriesList();
			$response = Product::getLatestProductsApi($offset,$limit);
			for($i=0;$i<count($response);$i++){
				for($j=0;$j<count($catList);$j++){
					if($response[$i]['category_id'] === $catList[$j]['id']){
						$response[$i]['cat'] =  $catList[$j]['name'];
						break;
					}

				}
			}
			echo json_encode($response,JSON_UNESCAPED_UNICODE);
		} else{
			echo json_encode(['error'=>$_SESSION['token']],JSON_UNESCAPED_UNICODE);
		}

		return true;
	}

	public function actionUpdAnalytic(){

		$data =  json_decode($_POST);
		$key_api = $data['key'];

		//$_token = json_decode($_POST['_token']);

		if($key_api === self::KEY_API_ANALYTIC ){
			$response = Functions::analytic($data['data']);
			echo json_encode($response,JSON_UNESCAPED_UNICODE);
		} else{
			echo json_encode(['error'=>$data],JSON_UNESCAPED_UNICODE);
		}

		return true;
	}



}


