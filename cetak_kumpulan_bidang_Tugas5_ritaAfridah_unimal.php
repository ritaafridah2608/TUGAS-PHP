<?php
    require_once 'Lingkaran.php';
    require_once 'persegiPanjang.php';
    require_once 'Segitiga.php';


    $lingkaran = new Lingkaran();
    $persegiPanjang = new persegiPanjang();
    $segitiga = new Segitiga();

    $data = [$lingkaran, $persegiPanjang, $segitiga];
    $judul = ['No', 'Nama Bidang', 'Keterangan', 'Luas', 'Keliling'];
?>

<h3 align="center">Bangun Datar</h3>
<table border="1" cellpadding="10" cellspacing="0" align="center" width="50%" bgcolor="azure">
    <thead bgcolor="#BC8F8F">
        <tr>
            <?php 
            foreach ($judul as $jdl) {?>
            <th><?= $jdl; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        $ket = [1 =>'Jari-Jari =  14', 
        'Panjang = 8 <br> Lebar = 10', 
        'alas = 8 <br> tinggi = 12 <br> <br> Keliling : 
        <br> sisi a = 8
        <br> sisi b = 5
        <br> sisi c = 7'];

        foreach ($data as $dt) {?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $dt->NamaBidang() ?></td>
            <td><?= $ket[$no] ?></td>
            <td><?= $dt->luasBidang() ?></td>
            <td><?= $dt->kelilingBidang() ?></td>
        </tr>

        <?php  $no ++; } ?>
    </tbody>
    <tfoot>
        <?php
            foreach ($Keterangan as $ket => $hasil) {?>             
            <tr>
                <td colspan="2"><?= $ket ?></td>
                <td colspan="5" align="center"><?= $hasil ?></td>
            </tr>
        <?php } ?>
    </tfoot>
</table>