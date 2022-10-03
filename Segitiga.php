<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D{
    public $alas = 8, $tinggi = 12;
    public function namaBidang(){
        echo 'Segitiga';
    }

    public function luasBidang(){
        return $Luas = 0.5 * $this->alas * $this->tinggi;
    }

    public function kelilingBidang(){
        $sisi_a = 8; 
        $sisi_b = 5;
        $sisi_c = 7; 

        return $Keliling = $sisi_a + $sisi_b + $sisi_c;
    }
}