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
	
	public function index($page){
		$keuangan = $this->getModel()->viewKeuangan(Session::getUser()['id'], $page);
		$jumlah = $this->getModel()->jumlahViewKeuangan(Session::getUser()['id']);
		$jumlah = ceil($this->fetch($jumlah)[0]/10);
		$this->view('dashboard',['username'=>$this->username,'keuangan'=>$keuangan, 'jumlah'=>$jumlah]);
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
			header('Location: ' . $this->baseUrl('keuangan/index/1'));
		}else{
			Session::setFlash("Gagal menambahkan transaksi");
			header('Location: ' . $this->baseUrl('keuangan/index/1'));
		}
	}

	public function delete($id){
		$kat = $this->getModel()->deleteTransaksi($id);
		if($kat){
			Session::setFlash("Berhasil menghapus transaksi");
			header('Location: ' . $this->baseUrl('keuangan/index/1'));
		}else{
			Session::setFlash("Gagal menghapus transaksi");
			header('Location: ' . $this->baseUrl('keuangan/index/1'));
		}
	}

	public function toUang($uang){
		$uang = "Rp. " . number_format($uang,0,',','.') . ",-";
		return $uang;
	}

	public function toTanggal($tanggal){
		$tanggal = date('d F Y', strtotime($tanggal));
		return $tanggal;
	}
}