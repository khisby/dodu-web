<?php

class KategoriAPI extends Controller{

	private $username;
	private $id;

	public function __construct(){
		$modelPengguna = $this->createModel('mPengguna');
		$pengguna = $modelPengguna->findPenggunaByToken($this->getParams("token"));
		if(!$pengguna){
			$this->toJson(401, "Token tidak valid", []);
			die();
		}
		$this->id = $pengguna[0];
		$this->setModel('mkategori');
	}
	
	public function index(){
		$data = $this->fetchApi($this->getModel()->viewKategori($this->id));
		$this->toJson(
			200, 
			"Berhasil mendapatkan list kategori", 
			$data
		);
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