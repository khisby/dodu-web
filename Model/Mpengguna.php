<?php

class Mpengguna extends Model{

    public function __construct(){
        $this->setTable('pengguna');
    }

    public function find($email){
        $query = "select * from " . $this->getTable() . " where surel_pengguna='$email'";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return mysqli_fetch_array($mysqli_query);
        }else{
            return false;
        }
    }

    public function insert($nama, $surel, $sandi){
        $query = "insert into " . $this->getTable() . " values(null, '$nama', '$surel', '$sandi', '')";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function updateToken($id, $token){
        $query = "update " . $this->getTable() . " set TOKEN_PENGGUNA = '$token' where ID_PENGGUNA=$id";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return true;
        }else{
            return false;
        }
    }

    public function findPenggunaByToken($token){
        $query = "select * from " . $this->getTable() . " where TOKEN_PENGGUNA='$token'";
        $mysqli_query  = mysqli_query($this->getDb(), $query);
        if($mysqli_query){
            return mysqli_fetch_array($mysqli_query);
        }else{
            return false;
        }
    }
}