<?php


class LaporanAPI extends Controller{
	
	private $username;
	private $id;

	public function __construct(){
		$pengguna = $this->getLoginApiMiddleware();
		$this->id = $pengguna[0];
		$this->setModel('mlaporan');
	}
	
	public function index(){
		$bulan = date('m');
		$laporan = $this->getModel()->view($this->id,$bulan);
		$kategori = [];
		$angka = [];
		$masuk = [];
		$keluar = [];
		$total = [];
		while($data = mysqli_fetch_array($laporan)){
			if(!in_array($data['NAMA_KATEGORI'],$kategori)){
				array_push($kategori, $data[6]);
				array_push($angka, 1);
				array_push($keluar, 0);
				array_push($masuk, 0);
				array_push($total, 0);

				$index = array_search($data[6], $kategori);
				$angka[$index] = $angka[$index] + 1;
				if($data[2] == 0){
					$keluar[$index] = $keluar[$index] + $data[3];
				}else{
					$masuk[$index] = $masuk[$index] + $data[3];
				}
				$total[$index] = $masuk[$index] - $keluar[$index];
			}else{
				$index = array_search($data[6], $kategori);
				$angka[$index] = $angka[$index] + 1;
				if($data[2] == 0){
					$keluar[$index] = $keluar[$index] + $data[3];
				}else{
					$masuk[$index] = $masuk[$index] + $data[3];
				}
				$total[$index] = $masuk[$index] - $keluar[$index];
			}
		}
		// $laporan = $this->fetchApi($laporan);
		// var_dump($this->fetchApi($laporan));
		// die();
		$data = [
			// 'laporan' => $laporan, 
			'kategori'=>$kategori, 
			'angka' => $angka, 
			'keluar' => $keluar, 
			'masuk' => $masuk, 
			'total' => $total
		];
		
		$this->toJson(
			200, 
			"Berhasil mendapatkan laporan", 
			$data
		);
	}

	public function toUang($uang){
		$uang = $uang == 0 ? '-' : "Rp. " . number_format($uang,0,',','.') . ",-";
		return $uang;
	}

}