<?php
//array scalar
$m1 = ['nim'=>'200170140','nama'=>'Rita','nilai'=>95];
$m2 = ['nim'=>'200170131','nama'=>'Ferdy','nilai'=>90];
$m3 = ['nim'=>'200170158','nama'=>'Dio','nilai'=>75];
$m4 = ['nim'=>'200170113','nama'=>'Tata','nilai'=>38];
$m5 = ['nim'=>'200170105','nama'=>'Dini','nilai'=>53];
$m6 = ['nim'=>'200170149','nama'=>'Afri','nilai'=>92];
$m7 = ['nim'=>'200170120','nama'=>'Awan','nilai'=>88];
$m8 = ['nim'=>'200170125','nama'=>'Zaza','nilai'=>50];
$m9 = ['nim'=>'200170110','nama'=>'Aqil','nilai'=>91];
$m10 =['nim'=>'200170152','nama'=>'Ema','nilai'=>25];
$m11 =['nim'=>'200170134','nama'=>'Erfan','nilai'=>49];


$ar_judul = ['No','NIM','Nama','Nilai','Keterangan',
'Grade','Predikat'];

//array assosiatif
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11];

//aggregate funtion

$jumlah_mahasiswa = count($mahasiswa);
$jml_nilai = array_column($mahasiswa,'nilai');
$total_nilai= array_sum($jml_nilai);
$max_nilai = max($jml_nilai);
$min_nilai = min($jml_nilai);
$rata2= $total_nilai / $jumlah_mahasiswa ;
//keterangan
$keterangan=[
            'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
            'Nilai Tertinggi'=>$max_nilai,
            'Nilai Terendah'=>$min_nilai,
            'Nilai Rata-Rata'=>$rata2
]

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUGAS3 PHP_RITA AFRIDAH_UNIMAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <h3 align="center" >Daftar Nilai Mahasiswa</h3>
    <br/>
        <table class="table table-bordered table-striped"  bgcolor="azure">
            <thead bgcolor="#BC8F8F" align="center">
                <tr>
                    <?php
                    foreach($ar_judul as $jdl){                  
                    ?>
                        <th><?=$jdl ?></th>
                    <?php } ?>   
                </tr>
            </thead>
       
            <tbody>
            <?php
                $no=1;
                foreach($mahasiswa as $mhs){
                
                    //tentukan keterangan
                    $kete = ( $mhs['nilai'] >= 60) ? "Lulus" : "Gagal";


                    //tentukan grade
                    if ( $mhs['nilai'] >=85 && $mhs['nilai'] <=100) $grade='A';
                        else if ( $mhs['nilai'] >=75 && $mhs['nilai'] <85) $grade='B';
                        else if ( $mhs['nilai']>=60 && $mhs['nilai'] <75) $grade='C';
                        else if ( $mhs['nilai'] >=45 && $mhs['nilai'] <60) $grade='D';
                        else if ( $mhs['nilai'] >=0 && $mhs['nilai'] <45) $grade='E';
                        else $grade="";     
                    
                    //tentukan predikat
                    switch ($grade) {
                        case 'A': $predikat = 'Memuaskan'; 
                            break;
                        case 'B': $predikat = 'Bagus'; 
                            break;
                        case 'C': $predikat = 'Cukup'; 
                            break;
                        case 'D': $predikat = 'Kurang'; 
                            break;
                        case 'E': $predikat = 'Buruk'; 
                            break;
                        default:$predikat='';
                    }
            ?>
                <tr>
                    <td><?= $no?></td>  
                    <td><?= $mhs['nim']?></td>  
                    <td><?= $mhs['nama']?></td>  
                    <td><?= $mhs['nilai']?></td>  
                    <td><?= $kete?></td>  
                    <td><?= $grade?></td>  
                    <td><?= $predikat?></td> 
                </tr>
                <?php $no++; } ?>
        </tbody>
        <tfoot>
            <?php
            foreach($keterangan as $ket => $hasil){
            ?>
            <tr>
                <th colspan="6"><?= $ket ?></th> 
                <th ><?= $hasil ?></th> 

            </tr>
            <?php }?>
        </tfoot>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>