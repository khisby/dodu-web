<?php


class Login extends Controller{

	public function __construct(){
		$this->setModel('mpengguna');
	}
	
	public function index(){
		$google_client = new Google_Client();
		$google_client->setClientId(clientId);
		$google_client->setClientSecret(secretId);
		$google_client->setRedirectUri($this->baseUrlAbsolute(''));
		$google_client->addScope('email');
		$google_client->addScope('profile');;

		if($this->getGet('code') != ''){
			$token = $google_client->fetchAccessTokenWithAuthCode($this->getGet('code'));
			if(!isset($token['error'])){
				$google_client->setAccessToken($token['access_token']);
				$_SESSION['access_token'] = $token['access_token'];
				$google_service = new Google_Service_Oauth2($google_client);
				$data = $google_service->userinfo->get();
				$nama = $data['given_name'];
				$email = $data['email'];

				if($this->getModel()->find($email) != false){
					$user = $this->getModel()->find($email);
					Session::setUser($user[0],$user[1],$user[2]);
					header('Location: ' . $this->baseUrl('keuangan/index/1'));
				}else{
					if($this->getModel()->insert($nama, $email, 'SANDIDARIGOOGLEINI')){
						if($this->getModel()->find($email) != false){
							$user = $this->getModel()->find($email);
							Session::setUser($user[0],$user[1],$user[2]);
							header('Location: ' . $this->baseUrl('keuangan/index/1'));
						}else{
							Session::setFlash("Gagal Registrasi");
							header('Location: ' . $_SERVER['HTTP_REFERER']);	
						}
					}else{
						Session::setFlash("Gagal Registrasi");
						header('Location: ' . $_SERVER['HTTP_REFERER']);
					}
				}


			}else{
				Session::setFlash("Gagal Login. Error pada API Google Auth. Hubungi Administrator");
				header('Location: ' .$this->baseUrl(''));
			}
		}else{
			$this->view('login',['google_client'=>$google_client]);
		}	
	}

	public function login(){
		$surelPengguna = $this->getPost('surelPengguna');
		$sandiPengguna = $this->getPost('sandiPengguna');

		if($this->getModel()->find($surelPengguna) != false){
			$user = $this->getModel()->find($surelPengguna);
			if($user[3] == md5($sandiPengguna)){
				Session::setUser($user[0],$user[1],$user[2]);
				header('Location: ' . $this->baseUrl('keuangan/index/1'));
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