<?php


class Logout extends Controller{
	
	public function index(){
		Session::destroyUser();
		header("location: " . $this->baseUrl(''));
	}

}