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
				$token = "TOKEN-KHISOFT-DODU-".md5(uniqid($user[2], true));
				if($this->getModel()->updateToken($user[0],$token)){
					$this->toJson(
						200, 
						"Berhasil Login", 
						[
							// "ID_PENGGUNA" => $user[0],
							"TOKEN" => $token,
							"NAMA_PENGGUNA" => $user[1],
							"SUREL_PENGGUNA" => $user[2],
						]
					);
				}else{
					$this->toJson(401, "Gagal generate token", []);
				}
			}else{
				$this->toJson(401, "Username atau password salah", []);
			}
		}else{
			$this->toJson(401, "Akun belum terdaftar", []);
		}
	}

}