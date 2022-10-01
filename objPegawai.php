<?php
require 'Pegawai.php';
//ciptakan object
$Riyta = new Pegawai('20212608','Rita Afridah','Manager','Muslim','Belum Menikah');
$Fer = new Pegawai('20210505','Ferdy Kurniawan','Asmen','Muslim','Menikah');
$Putra = new Pegawai('20210104','Muhammad Syahputra','Kabag','Muslim','Menikah');
$Deon = new Pegawai('20212621','Deonal Pradipta','Kabag','Non Muslim','Menikah');
$Sri = new Pegawai('20212407','Sri Wiyani','Staff','Non Muslim','Belum Menikah');


//use member class

echo '<h3 align="center">'.Pegawai::COMPANY.'</h3>';
$Riyta->mencetak();
$Fer->mencetak();
$Putra->mencetak();
$Deon->mencetak();
$Sri->mencetak();
echo 'Jumlah Pegawai: '.Pegawai::$jml;