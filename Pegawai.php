<?php
    class Pegawai{
        //member1 variabel
    protected $nip;
    public $nama;
    public $jabatan;
    private $agama;
    protected $status;

        //variabel konstanta $ static di dalam class
        static $jml = 0;
        const COMPANY = 'Raite Beauty Skincare ';

        //member2 konstruktor
        public function __construct($no, $pegawai, $jabatan,$agama,$status){
            $this->nip = $no;
            $this->nama = $pegawai;
            $this->jabatan = $jabatan;
            $this->agama = $agama;
            $this->status = $status;
            self::$jml++;
        }   
        //member method2
        public function gapok(){
            switch ($this->jabatan){
                case 'Manager' : $gapok = 15000000; break;
                case 'Asmen' : $gapok = 10000000; break;
                case 'Kabag'   : $gapok = 7000000; break;
                case 'Staff'   : $gapok = 4000000; break;
                default: $gapok=0;

        }
        return $gapok;
        }

        public function tunjab(){ 
            $tunjab = $this->gapok() * 0.2;
            return $tunjab;
         }

        public function tunkel(){
           $tunkel = ($this->status == 'Menikah' ) ? 0.1 * $this->gapok() : 0;
            return $tunkel;
            
        }
        public function gakot(){
            $gakot = $this->gapok() + $this->tunjab() + $this->tunkel() ;
            return $gakot;
            
        }
        public function zaprof(){
            $zaprof = ($this->agama == 'Muslim' && $this->gakot() >= 6000000) ? 0.025 * $this->gakot() : 0;
            return $zaprof;
            
        }
        public function takeHomePay(){
            $takeHomePay = $this->gakot() -  $this->zaprof();
            return $takeHomePay;
            
        }
        public function mencetak(){
            echo '<b><u>'.self::COMPANY.'</u></b>'; 
            echo '<br/>NIP : '.$this->nip;
            echo '<br/>Nama Pegawai: '.$this->nama;
            echo '<br/>Jabatan: '.$this->jabatan;
            echo '<br/>Agama: '.$this->agama;
            echo '<br/>Status: '.$this->status;
            echo '<br/>Gaji Pokok: Rp. '.number_format($this->gapok(), 0, ',', '.');
            echo '<br/>Tunjangan Jabatan: Rp. '.number_format($this->tunjab(), 0, ',', '.');
            echo '<br/>Tunjangan Keluarga: Rp. '.number_format($this->tunkel(), 0, ',', '.');
            echo '<br/>Zakat: Rp. '.number_format($this->zaprof(), 0, ',', '.');
            echo '<br/>Take Home Pay: Rp. '.number_format($this->takeHomePay(), 0, ',', '.');
            echo '<hr/>';
        }

}