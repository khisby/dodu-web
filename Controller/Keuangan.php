<?php


class Keuangan extends Controller{
	
	private $username;
	public function __construct(){
		if(Session::getUser() == NULL){
			Session::setFlash('Anda harus login terlebih dahulu');
			header("location:" . $this->baseUrl(''));
		}
		$this->setModel('mkeuangan');
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$keuangan = $this->getModel()->viewKeuangan(Session::getUser()['id']);
		$this->view('dashboard',['username'=>$this->username,'keuangan'=>$keuangan]);
	}

	public function tambah(){
		$kat = $this->getModel()->viewKategori(Session::getUser()['id']);
		$this->view('tambah-transaksi',['username'=>$this->username, 'kategori' => $kat]);
	 }

	public function prosestambah(){
		$kategori = $this->getPost('kategori');
		$keluarMasuk = $this->getPost('keluarMasuk');
		$nominal = $this->getPost('nominal');
		$keterangan = $this->getPost('keterangan');
		$pengguna = Session::getUser()['id'];
		$waktu = date("Y/m/d H:i:s");

		$keluarMasuk == "M" ? $keluarMasuk = 1 : $keluarMasuk = 0;
		
		if($this->getModel()->insert($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu)){
			Session::setFlash("Berhasil menambahkan transaksi");
			header('Location: ' . $this->baseUrl('keuangan'));
		}else{
			Session::setFlash("Gagal menambahkan transaksi");
			header('Location: ' . $this->baseUrl('keuangan'));
		}
	}
}