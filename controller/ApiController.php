<?php


class ApiController
{

	const KEY_API = "key";

	public function actionGetProduct()
	{
		$key_api = $_POST['key'];
		$id =  $_POST['offset'];

		if($key_api === self::KEY_API){
			$response = Product::getProductItemById($id);
			echo json_encode($response,JSON_UNESCAPED_UNICODE);
		} else{
			echo json_encode(['error'=>'error'],JSON_UNESCAPED_UNICODE);
		}

		return true;
	}

	public function actionGetLastProducts()
	{
		$key_api = $_POST['key'];
		$offset =  $_POST['offset'];
		$limit = $_POST['limit'];

		if($key_api === self::KEY_API){
			$response = Product::getLatestProductsApi($offset,$limit);
			echo json_encode($response,JSON_UNESCAPED_UNICODE);
		} else{
			echo json_encode(['error'=>'error'],JSON_UNESCAPED_UNICODE);
		}

		return true;
	}



}


