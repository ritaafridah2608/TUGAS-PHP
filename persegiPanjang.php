<?php
require_once 'Bentuk2D.php';
class persegiPanjang extends Bentuk2D{
    public $Panjang=8;
    public $Lebar=10;
    public function namaBidang(){
       echo 'Persegi Panjang';
    }
    public function luasBidang(){
        return $luasBidang = $this->Panjang * $this-> Lebar;
       
    }
    public function kelilingBidang(){
        return $kelilingBidang = 2 * ($this->Panjang + $this->Lebar) ;
        
    
}
}