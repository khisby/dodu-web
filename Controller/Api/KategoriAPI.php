<?php

class KategoriAPI extends Controller{

	private $username;
	private $id;

	public function __construct(){
		$pengguna = $this->getLoginApiMiddleware();
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
		$this->apiValidation("post", ['kategori']);
		$kategori = $this->getParams('kategori');

		if($this->getModel()->insert($kategori,$this->id)){
			$data = $this->fetchApi($this->getModel()->viewKategori($this->id));
			$this->toJson(
				200, 
				"Berhasil menambah kategori", 
				$data[sizeof($data)-1]
			);
		}else{
			$this->toJson(401, "Gagal menambah kategori", []);
		}
	 }

	public function update($id){
		$this->apiValidation("get", []);
		$data = $this->getModel()->viewKategori($this->id);
		$kat = $this->getModel()->kategori($id);
		$kat = $this->fetchApi($kat);

		$this->toJson(
			200, 
			"Berhasil mengambil data kategori dengan id " . $id, 
			$kat
		);
	}

	public function prosesUpdate(){
		$this->apiValidation("put", ['id','kategori']);
		$id = $this->getParams('id');
		$kategori = $this->getParams('kategori');

		if($this->getModel()->update($id,$kategori)){
			$data = $this->fetchApi($this->getModel()->kategori($id));
			$this->toJson(
				200, 
				"Berhasil mendapatkan list kategori", 
				$data
			);
		}else{
			$this->toJson(401, "Gagal mengupdate kategori", []);
		}
	 }

}