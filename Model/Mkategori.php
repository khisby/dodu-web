<?php

class Mkategori extends Model{

    public function __construct(){
        $this->setTable('kategori');
    }

    public function insert($kategori,$id){
        $query = "insert into " . $this->getTable() . " values(null, $id ,'$kategori')";
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

    public function kategori($id){
        $query = "select * from kategori where ID_KATEGORI='$id'";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return $mysqli_query;
        }else{
            return false;
        }
    }

    public function update($id, $kategori){
        $query = "update " . $this->getTable() . " set NAMA_KATEGORI = '$kategori' where ID_KATEGORI=$id";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $query = "delete from " . $this->getTable() . " where ID_KATEGORI=$id";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function getLastId(){
        return mysqli_insert_id($this->getDb());
    }
}