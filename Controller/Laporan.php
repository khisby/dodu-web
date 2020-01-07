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
		
		$this->view('laporan',['username' => $this->username, 'laporan' => $laporan, 'kategori'=>$kategori, 'angka' => $angka, 'keluar' => $keluar, 'masuk' => $masuk, 'total' => $total]);
	}

	public function toUang($uang){
		$uang = $uang == 0 ? '-' : "Rp. " . number_format($uang,0,',','.') . ",-";
		return $uang;
	}

}