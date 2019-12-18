<?php


class LogoutAPI extends Controller{

	public function __construct(){
		$this->setModel('mpengguna');
	}
	
	public function index(){
		$this->toJson(200, "ini halaman login", []);
	}

	public function logout(){
		$this->apiValidation("post", ['token']);
		$user = $this->getModel()->findPenggunaByToken($this->getParams('token'));
		$this->getModel()->updateToken($user[0],"");
		$this->toJson(200, "berhasil logout", []);
	}

}