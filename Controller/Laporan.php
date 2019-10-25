<?php


class Laporan extends Controller{
	
	private $username;

	public function __construct(){
		if(Session::getUser() == NULL){
			Session::setFlash('Anda harus login terlebih dahulu');
			header("location:" . $this->baseUrl(''));
		}
		$this->setModel('mlaporan');
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$bulan = date('m');
		$laporan = $this->getModel()->view(Session::getUser()['id'],$bulan);
		$kategori = [];
		$angka = [];
			while($data = mysqli_fetch_array($laporan)){
			if(!in_array($data['NAMA_KATEGORI'],$kategori)){
				array_push($kategori, $data[6]);
				array_push($angka, 1);
			}else{
				$index = array_search($data[6], $kategori);
				$angka[$index] = $angka[$index] + 1; 
			}
		}
		$this->view('laporan',['username' => $this->username, 'laporan' => $laporan, 'kategori'=>$kategori, 'angka' => $angka]);
	}

}