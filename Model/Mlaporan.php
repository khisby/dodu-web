<?php

class Mlaporan extends Model{

    public function __construct(){
        $this->setTable('transaksi');
    }

    public function view($id,$bulan){
        $query = "SELECT transaksi.ID_TRANSAKSI, transaksi.ID_KATEGORI, transaksi.JENIS_TRANSAKSI, transaksi.NOMINAL_TRANSAKSI, transaksi.KETERANGAN_TRANSAKSI, transaksi.WAKTU_TRANSAKSI, kategori.NAMA_KATEGORI FROM transaksi JOIN kategori ON kategori.ID_KATEGORI = transaksi.ID_KATEGORI where transaksi.ID_PENGGUNA = $id AND month(WAKTU_TRANSAKSI) = $bulan";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }
}