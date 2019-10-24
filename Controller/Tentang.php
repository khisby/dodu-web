<?php


class Tentang extends Controller{
	
	private $username;
	public function __construct(){
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$this->view('tentang',['username'=> $this->username]);
	}

}