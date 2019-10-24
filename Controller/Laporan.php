<?php


class Laporan extends Controller{
	
	private $username;

	public function __construct(){
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$this->view('laporan',['username' => $this->username]);
	}

}