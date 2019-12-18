<?php


class RegistrasiAPI extends Controller{
	
	public function __construct(){
		$this->setModel('mpengguna');
	}

	public function index(){
		$this->toJson(200, "ini halaman Register", []);
	}

	public function register(){
		$this->apiValidation("post", ['surelPengguna','sandiPengguna','namaPengguna']);

		$namaPengguna = $this->getParams('namaPengguna');
		$surelPengguna = $this->getParams('surelPengguna');
		$sandiPengguna = $this->getParams('sandiPengguna');
		
		if($this->getModel()->insert($namaPengguna, $surelPengguna, $sandiPengguna)){
			$user = $this->getModel()->find($surelPengguna);
			
			$this->toJson(
				201, 
				"Berhasil registrasi. Silahkan Login", 
				[

				]
			);
		}else{
			$this->toJson(401, "Gagal registrasi", []);
		}
	 }
}