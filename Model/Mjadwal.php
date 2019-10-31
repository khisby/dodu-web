<?php

class MJadwal extends Model{

    public function __construct(){
        $this->setTable('jadwal');
    }

    public function insert($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu){
        $query = "insert into " . $this->getTable() . " values(null, $kategori , $pengguna, $keluarMasuk, '$nominal', '$keterangan', '$waktu')";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function viewKategori($id){
        $query = "select * from kategori where ID_PENGGUNA='$id'";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function viewJadwal($id){
        $query = "select * from " . $this->getTable() . " JOIN kategori on kategori.ID_KATEGORI = ".$this->getTable().".ID_KATEGORI where ".$this->getTable().".ID_PENGGUNA='$id' order by ".$this->getTable().".ID_".$this->getTable()." DESC";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function viewJadwalAll(){
        $query = "select * from " . $this->getTable();
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function viewTransaksiBulanIni($bulan){
        $query = "SELECT transaksi.ID_TRANSAKSI, transaksi.ID_KATEGORI, transaksi.JENIS_TRANSAKSI, transaksi.ID_PENGGUNA, transaksi.NOMINAL_TRANSAKSI, transaksi.KETERANGAN_TRANSAKSI, transaksi.WAKTU_TRANSAKSI, kategori.NAMA_KATEGORI FROM transaksi JOIN kategori ON kategori.ID_KATEGORI = transaksi.ID_KATEGORI where month(WAKTU_TRANSAKSI) = $bulan";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function insertTransaksi($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu){
        $query = "insert into transaksi values(null, $kategori , $pengguna, $keluarMasuk, '$nominal', '$keterangan', '$waktu')";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }
}