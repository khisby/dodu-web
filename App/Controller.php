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

	public function getModel(){
		return $this->model;
	}

	public function fetch($data){
		return mysqli_fetch_array($data);
	}

}