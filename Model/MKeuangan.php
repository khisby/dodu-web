<?php

class Mkeuangan extends Model{

    public function __construct(){
        $this->setTable('transaksi');
    }

    public function viewKeuangan($id, $page){
        $page = ($page-1) * 10;
        $query = "select * from " . $this->getTable() . " JOIN kategori on kategori.ID_KATEGORI = transaksi.ID_KATEGORI where transaksi.ID_PENGGUNA='$id' order by transaksi.WAKTU_TRANSAKSI DESC LIMIT $page, 10";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function viewKeuanganAll($id){
        $query = "select * from " . $this->getTable() . " JOIN kategori on kategori.ID_KATEGORI = transaksi.ID_KATEGORI where transaksi.ID_PENGGUNA='$id' order by transaksi.WAKTU_TRANSAKSI DESC";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function jumlahViewKeuangan($id){
        $query = "select count(ID_TRANSAKSI) from " . $this->getTable() . " JOIN kategori on kategori.ID_KATEGORI = transaksi.ID_KATEGORI where transaksi.ID_PENGGUNA='$id' order by transaksi.WAKTU_TRANSAKSI DESC";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
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

    public function insert($kategori,$keluarMasuk,$nominal,$keterangan,$pengguna,$waktu){
        $query = "insert into " . $this->getTable() . " values(null, $kategori , $pengguna, $keluarMasuk, '$nominal', '$keterangan', '$waktu')";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function deleteTransaksi($id){
        $query = "select * from " . $this->getTable() . " where transaksi.ID_TRANSAKSI='$id'";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if(mysqli_affected_rows($this->getDb()) != 0){
            $query = "DELETE FROM " . $this->getTable() . " where ID_TRANSAKSI = $id";
            $mysqli_query  = mysqli_query($this->getDb(), $query);
            if($mysqli_query){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function deleteTransaksiByIdKategori($id){
        $query = "delete from " . $this->getTable() . " where ID_KATEGORI=$id";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

}