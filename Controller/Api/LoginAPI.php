<?php


class LoginAPI extends Controller{

	public function __construct(){
		$this->setModel('mpengguna');
	}

	public function index(){
		$this->toJson(200, "ini halaman login", []);
	}

	public function login(){
		$this->apiValidation("post", ['surelPengguna','sandiPengguna']);

		$surelPengguna = $this->getParams('surelPengguna');
		$sandiPengguna = $this->getParams('sandiPengguna');

		if($this->getModel()->find($surelPengguna) != false){
			$user = $this->getModel()->find($surelPengguna);
			if($user[3] == $sandiPengguna){
				$this->toJson(
					200, 
					"Berhasil Login", 
					[
						"ID_PENGGUNA" => $user[0],
						"NAMA_PENGGUNA" => $user[1],
						"SUREL_PENGGUNA" => $user[2],
						"SANDI_PENGGUNA" => ""
					]
				);
			}else{
				$this->toJson(401, "Username atau password salah", []);
			}
		}else{
			$this->toJson(401, "Akun belum terdaftar", []);
		}
	}

}