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
			// if(dev == "local"){
			// 	// define('baseUrl', $_SERVER['SERVER_NAME'] . '/' . $url[0]. '/');
			// 	define('baseUrl',  $url[0]. '/');
			// }else{
			// 	define('baseUrl',$_SERVER['SERVER_NAME'] . '/');
			// }
			$baseUrl = $url[0];
			unset($url[0]);
			
			if(file_exists('Controller/' . $url[1] . '.php')){
				$this->setController($url[1]);
				unset($url[1]);
			}
			
			require_once($this->getController(true));
			$this->controller = new $this->controller;

			if(isset($url[2])){
				if(method_exists($this->getController(true),$url[2])){
					$this->method = strtolower($url[2]);
					unset($url[2]);
				}else{
					echo "method tidak ada. routing anda salah";
					die();
				}
			}

			if(!empty($url)){
				$this->data = array_values($url);
			}
		}else{
			// if(dev == "local"){
			// 	// define('baseUrl', $_SERVER['SERVER_NAME'] . '/' . $dir);
			// 	define('baseUrl',  '/' . $dir);
			// }else{
			// 	// define('baseUrl', $_SERVER['SERVER_NAME'] . '/');
			// 	define('baseUrl', $_SERVER['SERVER_NAME'] . '/');
			// }

			require_once($this->getController(true));
			$this->controller = new $this->controller;

			if(isset($url[2])){
				if(method_exists($this->getController(true),$url[2])){
					$this->method = strtolower($url[2]);
					unset($url[2]);
				}else{
					echo "method tidak ada. routing anda ";
					die();
				}
			}

			if(!empty($url)){
				$this->data = array_values($url);
			}
		}

		call_user_func_array([$this->getController(false),$this->getMethod()], $this->getData());
		// $this->autoloader();
	}

	// public function autoloader(){
	// 	if(count($_GET) > 0){
	// 		$url = explode('/',ltrim(rtrim($_SERVER['REQUEST_URI'], '/'),'/'));
	// 		$baseUrl = $url[0];
	// 		unset($url[0]);

	// 		spl_autoload_register(function ($class) use ($url){
	// 			$class = ucfirst(strtolower($class));
	// 			if(file_exists('Controller/' . $url[1] . '.php')){
	// 				require_once('Controller/' . $url[1] . '.php');
	// 				$this->setController = $url[1];
	// 				unset($url[1]);
	// 			}else{
	// 				echo "Controller tidak ada";
	// 				die();
	// 			}
	// 		});
	// 	}else{
			
	// 	} 
		
	// 	$this->controller = new $this->controller;
	// }

	public function setController($controller){
		$this->controller = ucfirst(strtolower($controller));
	}


	public function getController($withPhp){
		if(!is_string($this->controller)){
			return $this->controller;
		}

		if($withPhp){
			return 'Controller/' . $this->controller . '.php';
		}else{
			return $this->controller;
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