<?php


class Logout extends Controller{
	
	public function index(){
		Session::destroyUser();
		$google_client = new Google_Client();
		$google_client->setClientId(clientId);
		$google_client->setClientSecret(secretId);
		$google_client->setRedirectUri($this->baseUrlAbsolute(''));
		$google_client->addScope('email');
		$google_client->addScope('profile');;
		$google_client->revokeToken();
		header("location: " . $this->baseUrl(''));
	}

}