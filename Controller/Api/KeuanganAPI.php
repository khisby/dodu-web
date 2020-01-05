<?php


class KeuanganAPI extends Controller{

	private $username;
	private $id;

	public function __construct(){
		$pengguna = $this->getLoginApiMiddleware();
		$this->id = $pengguna[0];
		$this->setModel('mkeuangan');
	}
	
	public function index($page = 1){
		$keuangan = $this->getModel()->viewKeuanganAll($this->id);
		$keuangan = $this->fetchApi($keuangan);
		// $jumlah = $this->getModel()->jumlahViewKeuangan($this->id);
		// $jumlah = ceil($this->fetch($jumlah)["count(ID_TRANSAKSI)"]/10);
		$this->toJson(
			200, 
			"Berhasil mendapatkan list kategori", 
			[
				"kauangan" => $keuangan,
			]
		);
	}


	public function prosestambah(){
		$this->apiValidation("post", ['kategori','keluarMasuk','nominal','keterangan']);
		$kategori = $this->getParams('kategori');
		$keluarMasuk = $this->getParams('keluarMasuk');
		$nominal = $this->getParams('nominal');
		$keterangan = $this->getParams('keterangan');
		$pengguna = $this->id;
		$waktu = date("Y/m/d H:i:s");

		$keluarMasuk == "M" ? $keluarMasuk = 1 : $keluarMasuk = 0;
		
		if($this->getModel()->insert($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu)){
			$keuangan = $this->getModel()->viewKeuangan($this->id, 1);
			$keuangan = $this->fetchApi($keuangan);
			$jumlah = $this->getModel()->jumlahViewKeuangan($this->id);
			$jumlah = ceil($this->fetch($jumlah)["count(ID_TRANSAKSI)"]/10);
			$this->toJson(
				200, 
				"Berhasil menambahkan Keuangan", 
				[
					"kauangan" => $keuangan[0],
					"jumlahPage" => $jumlah
				]
			);
		}else{
			$this->toJson(401, "Gagal menambah keuangan", []);
		}
	}

	public function delete(){
		$this->apiValidation("delete", ['id']);
		$id = $this->getParams('id');
		
		$kat = $this->getModel()->deleteTransaksi($id);
		if($kat){
			$this->toJson(200, "Berhasil menghapus keuangan", []);
		}else{
			$this->toJson(200, "Gagal menghapus keuangan", []);
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