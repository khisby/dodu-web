<?php

class App{
	protected $controller = 'Login';
	protected $method = 'index';
	protected $data = [];

	public function __construct(){
		$dir = explode('\\', dirname(__FILE__));
		$dir = $dir[count($dir)-2];

		if(count($_GET) > 0){
			$url = explode('/',ltrim(rtrim($_SERVER['REQUEST_URI'], '/'),'/'));
			$baseUrl = $url[0];
			unset($url[0]);

			if($url[1] == 'api'){
				unset($url[1]);
				if(!isset($url[2])){
					echo "Ini adalah halaman RestFull API. silahkan lihat dokumentasi untuk menggunakannya.";
					die();
				}
				if(file_exists('Controller/Api/' . ucfirst(strtolower($url[2]))."API" . '.php')){
					$this->setController($url[2],true);
					unset($url[2]);
				}
			}else{
				if(file_exists('Controller/' . ucfirst(strtolower($url[1])) . '.php')){
					$this->setController($url[1], false);
					unset($url[1]);
				}
			}
			
		}

		require_once($this->getController(true));
		$file = $this->getController(false);
		$this->controller = new $this->controller;

		if(substr($file, -3) == "API"){
			if(isset($url[3])){
				if(method_exists($this->getController(true),$url[3])){
					$this->method = strtolower($url[3]);
					unset($url[3]);
				}else{
					echo "method tidak ada. routing anda salah ";
					die();
				}
			}
		}else{
			if(isset($url[2])){
				if(method_exists($this->getController(true),$url[2])){
					$this->method = strtolower($url[2]);
					unset($url[2]);
				}else{
					echo "method tidak ada. routing anda salah ";
					die();
				}
			}
		}

		
		
		if(!empty($url)){
			$this->data = array_values($url);
		}

		call_user_func_array([$this->getController(false),$this->getMethod()], $this->getData());
	}

	public function setController($controller, $api){
		if($api == true){
			$this->controller = ucfirst(strtolower($controller))."API";
		}else{
			$this->controller = ucfirst(strtolower($controller));
		}
	}


	public function getController($withPhp){
		if(!is_string($this->controller)){
			return $this->controller;
		}

		if(substr($this->controller, -3) == "API"){
			if($withPhp){
				return 'Controller/Api/' . $this->controller . '.php';
			}else{
				return $this->controller;
			}
		}else{
			if($withPhp){
				return 'Controller/' . $this->controller . '.php';
			}else{
				return $this->controller;
			}
		}
		

	}

	public function getMethod(){
		return $this->method;
	}

	public function getData(){
		return $this->data;
	}

	public function setBaseUrl($url){
		$this->baseUrl = $url;
	}

	public function getBaseUrl(){
		return $this->baseUrl;
	}

	// public function dd($var){
	// 	var_dump($var);
	// 	die();
	// }

}
