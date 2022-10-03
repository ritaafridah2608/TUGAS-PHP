<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D{
    public $phi= 3.14;
    public $jari2=14;
    public function namaBidang(){
       echo 'Lingkaran';
    }
    public function luasBidang(){
        return $luasBidang = $this->phi * $this->jari2  * $this->jari2;
       
    }
    public function kelilingBidang(){
        return $kelilingBidang = 2 *$this->phi * $this->jari2 ;
        
    
}
}