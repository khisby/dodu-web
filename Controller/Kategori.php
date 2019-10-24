<?php

class Kategori extends Controller{

	private $username;
	public function __construct(){
		if(Session::getUser() == NULL){
			Session::setFlash('Anda harus login terlebih dahulu');
			header("location:" . $this->baseUrl(''));
		}

		$this->setModel('mkategori');
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$this->view('tambah-kategori',['username' => $this->username]);
	}

	public function tambah(){
		$kategori = $this->getPost('kategori');

		if($this->getModel()->insert($kategori,Session::getUser()['id'])){
			Session::setFlash("Berhasil menambahkan kategori");
			header('Location: ' . $this->baseUrl('keuangan/tambah'));
		}else{
			Session::setFlash("Gagal menambah kategori");
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	 }
}