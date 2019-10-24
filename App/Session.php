<?php

class Session{
    public static function setUser($id, $username, $email){
        $_SESSION['user'] = [
            'id' => $id,
            'username' => $username,
            'email' => $email
        ];
    }

    public static function getUser(){
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public static function destroyUser(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
    }

    public static function setFlash($pesan){
        $_SESSION['pesan'] = $pesan;
    }

    public static function getFlash(){
        if(isset($_SESSION['pesan'])){
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
        }
    }
}