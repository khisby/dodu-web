<?php

class Jadwal extends Controller{

	private $username;
	public function __construct(){
		if(Session::getUser() == NULL){
			Session::setFlash('Anda harus login terlebih dahulu');
			header("location:" . $this->baseUrl(''));
		}

		$this->setModel('mjadwal');
		$this->username = Session::getUser()['username'];
	}
	
	public function index(){
		$kat = $this->getModel()->viewKategori(Session::getUser()['id']);
		$jadwal = $this->getModel()->viewJadwal(Session::getUser()['id']);
		$this->view('jadwal',['username'=>$this->username, 'kategori' => $kat, 'jadwal' => $jadwal]);
	}

	public function prosestambah(){
		$kategori = $this->getPost('kategori');
		$keluarMasuk = $this->getPost('keluarMasuk');
		$nominal = $this->getPost('nominal');
		$keterangan = $this->getPost('keterangan');
		$pengguna = Session::getUser()['id'];
		$waktu = $this->getPost('tanggal');

		$keluarMasuk == "M" ? $keluarMasuk = 1 : $keluarMasuk = 0;
		
		if($this->getModel()->insert($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu)){
			Session::setFlash("Berhasil menambahkan transaksi");
			header('Location: ' . $this->baseUrl('jadwal'));
		}else{
			Session::setFlash("Gagal menambahkan transaksi");
			header('Location: ' . $this->baseUrl('jadwal'));
		}
	}

	public function run(){
		$bulan = date("m");
		$tanggal = date("d");
		$jadwal = $this->getModel()->viewJadwalAll();
		$transaksi = $this->getModel()->viewTransaksiBulanIni($bulan);

		while($jat = $this->fetch($jadwal)){
			$sudahAda = false;
			if($jat['WAKTU_JADWAL'] == $tanggal){
				while($tran = $this->fetch($transaksi)){
					$waktu = $tran['WAKTU_TRANSAKSI'];
					$tgl =  $tran['WAKTU_TRANSAKSI'][8] . $tran['WAKTU_TRANSAKSI'][9];
					
					if($tgl == $tanggal){
						if($jat['ID_KATEGORI'] == $tran['ID_KATEGORI'] && $jat['ID_PENGGUNA'] == $tran['ID_PENGGUNA'] && $jat['JENIS_TRANSAKSI'] == $tran['JENIS_TRANSAKSI'] && $jat['NOMINAL_TRANSAKSI'] == $tran['NOMINAL_TRANSAKSI'] && $jat['KETERANGAN_TRANSAKSI'] == $tran['KETERANGAN_TRANSAKSI']){
							$sudahAda = true;
							break;
						}else{
							$sudahAda = false;
						}
					}
				}
			}

			if(!$sudahAda){
				$waktuSekarang = date("Y/m/d H:i:s");
				$this->getModel()->insertTransaksi($jat['ID_KATEGORI'],$jat['JENIS_TRANSAKSI'],$jat['NOMINAL_TRANSAKSI'],$jat['KETERANGAN_TRANSAKSI'],$jat['ID_PENGGUNA'],$waktuSekarang);
			}

		}

	}

}