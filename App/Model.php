<?php

class Model{
    private $db;
    private $table;

    public function getDb(){
        return $this->db;
    }

    public function setTable($table){
        if(!mysqli_connect(hostname,username,password,database)){
            echo "Gagal konek database";
            die();
        }

        $this->db = mysqli_connect(hostname,username,password,database);
        $this->table = $table;
    }

    public function getTable(){
        return $this->table;
    }
}