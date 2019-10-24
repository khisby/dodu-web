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
}