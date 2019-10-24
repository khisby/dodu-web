<?php


class Login extends Controller{

	public function __construct(){
		$this->setModel('mpengguna');
	}
	
	public function index(){
		$this->view('login',[]);
	}

	public function login(){
		$surelPengguna = $this->getPost('surelPengguna');
		$sandiPengguna = $this->getPost('sandiPengguna');

		if($this->getModel()->find($surelPengguna) != false){
			$user = $this->getModel()->find($surelPengguna);
			if($user[3] == $sandiPengguna){
				Session::setUser($user[0],$user[1],$user[2]);
				header('Location: ' . $this->baseUrl('keuangan'));
			}else{
				Session::setFlash("Gagal Login. surel atau sandi salah");
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}else{
			Session::setFlash("Gagal Login akun tidak terdaftar");
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

}