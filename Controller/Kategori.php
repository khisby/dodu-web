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
		$data = $this->getModel()->viewKategori(Session::getUser()['id']);
		$this->view('tambah-kategori',['username' => $this->username, 'kategori' => $data]);
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

	public function update($id){
		$data = $this->getModel()->viewKategori(Session::getUser()['id']);
		$kat = $this->getModel()->kategori($id);
		$kat = $this->fetch($kat);

		$this->view('tambah-kategori',['username' => $this->username, 'kategori' => $data, 'kat' => $kat]);
	}

	public function prosesUpdate(){
		$id = $this->getPost('id');
		$kategori = $this->getPost('kategori');

		if($this->getModel()->update($id,$kategori)){
			Session::setFlash("Berhasil mengubah kategori");
			header('Location: ' . $this->baseUrl('kategori'));
		}else{
			Session::setFlash("Gagal mengubah kategori");
			header('Location: ' . $this->baseUrl('kategori'));
		}
	 }

}