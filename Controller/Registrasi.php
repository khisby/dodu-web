<?php


class Registrasi extends Controller{
	
	public function __construct(){
		$this->setModel('mpengguna');
	}

	public function index(){
		$this->view('register',[]);
	}

	public function register(){
		$namaPengguna = $this->getPost('namaPengguna');
		$surelPengguna = $this->getPost('surelPengguna');
		$sandiPengguna = $this->getPost('sandiPengguna');
		
		if($this->getModel()->insert($namaPengguna, $surelPengguna, $sandiPengguna)){
			Session::setFlash("Berhasil Registrasi");
			header('Location: ' . $this->baseUrl('login'));
		}else{
			Session::setFlash("Gagal Registrasi");
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	 }
}