<?php

class Controller{
	private $model;

	public function view($view, $data = []){
		extract($data);
		require_once('View/layout.php');
	}

	public function baseUrl($url){
		return '/' . host . '/' . $url;
	}

	public function getPost($post){
		if(isset($_POST[$post]) && !empty($_POST[$post])){
			return $_POST[$post];
		}
		return '';
	}

	public function getGet($get){
		if(isset($_GET[$get]) && !empty($_GET[$get])){
			return $_GET[$get];
		}
		return '';
	}

	public function setModel($model){
		$model = ucfirst(strtolower($model));
		if(file_exists('Model/' . $model . '.php')){
			require_once('Model/' . $model . '.php');
			$this->model = new $model;
		}else{
			echo "file model tidak ada";
			die();
		}
	}

	public function createModel($model){
		$model = ucfirst(strtolower($model));
		if(file_exists('Model/' . $model . '.php')){
			require_once('Model/' . $model . '.php');
			$modelNew = new $model;
			return $modelNew;
		}else{
			return false;
		}
	}

	public function getModel(){
		return $this->model;
	}

	public function fetch($data){
		return mysqli_fetch_assoc($data);
	}

	public function fetchApi($data){
		$arr = [];
		while($d = mysqli_fetch_assoc($data)){
			array_push($arr, $d);
		}
		return $arr;
	}


	// -------------------API FUNCTION------------------

	public function toJson($status, $pesan, $data){
		$hasil = [
			'status' => $status,
			'pesan' => $pesan,
			'data' => $data
		];
		header('Content-type: application/json');
		echo json_encode($hasil,JSON_UNESCAPED_UNICODE);
	}

	public function apiValidation($method, $parameter){
		// header('Access-Control-Allow-Origin: *');
		// header('Content-Type: application/json');
		
		
		// if(strtolower($method) == "post"){
		// 	header('Access-Control-Allow-Methods: POST');
		// 	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type Access-Control-Allow-Methods, Authorization, X-Requested-With');
		// }else if(strtolower($method) == "delete"){
		// 	header('Access-Control-Allow-Methods: DELETE');
		// 	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type Access-Control-Allow-Methods, Authorization, X-Requested-With');
		// }else if(strtolower($method) == "put"){
		// 	header('Access-Control-Allow-Methods: PUT');
		// 	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type Access-Control-Allow-Methods, Authorization, X-Requested-With');
		// }else if(strtolower($method) == "delete"){
		
		// }else{
		// 	echo "request method tidak tersedia!";
		// 	die();
		// }

		if ($_SERVER['REQUEST_METHOD'] != strtoupper($method)) {
			echo "Request method tidak di izinkan!";
			die();	
	   	}

		$data = json_decode(file_get_contents("php://input"),true);
		foreach($parameter as $p){
			if(!isset($data[$p])){
				$this->toJson(403, 'Parameter ' . $p . ' harus ada', []);
			}
		}


		// $data = ['surelPengguna' => 'khisby@gmail.com', 'sandiPengguna' => 'sandi'];
		// echo json_decode($data);
	}

	public function getParams($param){
		$data = json_decode(file_get_contents("php://input"),true);

		if(!isset($data[$param])){
			echo "Parameter " . $param . " Tidak tersedia!";
			die();
		}

		return $data[$param];
	}
}