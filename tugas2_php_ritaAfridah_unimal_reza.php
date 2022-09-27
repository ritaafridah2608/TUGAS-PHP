<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas1 PHP Rita Afridah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="alert alert-primary " role="alert"   >
        <h3 align=center> Input Data Pegawai</h3>
    </div>
  <div class="container px-5 my-5">
    <form id="contactForm" method="POST">
        <div class=" mb-3">
            <label class="form-label" for="namaPegawai">Nama Pegawai</label>
            <input class="form-control" name="nama" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class=" mb-3">
        <label class="form-label" for="agama">Agama</label>
            <select class="form-select" name="agama" aria-label="Agama ">
                <option value="--Pilih Agama--">--Pilih Agama--</option>
                <option value="Muslim">Muslim</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>  
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check">
                <input class="form-check-input" id="manager" type="radio" name="jabatan" value="Manager" data-sb-validations="required" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="assisten" type="radio" name="jabatan" value="Assisten"data-sb-validations="required"   />
                <label class="form-check-label" for="assisten">Assisten</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="kabag" type="radio" name="jabatan" value="Kabag" data-sb-validations="required"  />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="staff" type="radio" name="jabatan" value="Staff"data-sb-validations="required" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="jabatan:required"></div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="menikah" type="radio" name="status"  value="Menikah"data-sb-validations="required"  />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                <input class="form-check-input" id="belumMenikah" type="radio" name="status" value="Belum Menikah" data-sb-validations="required" />
        
            </div>
            <div class="invalid-feedback" data-sb-feedback="status:required"></div>
        </div>
        <div class=" mb-3">
            <label class ="form-label" for="jumlahAnak">Jumlah Anak</label>
            <input class="form-control" name="jmlAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg " name="proses" type="submit">Simpan</button>
        </div>
    </form>

    <?php 
                error_reporting(0);
                //tangkap request
                $nama = $_POST['nama'];
                $agama = $_POST['agama'];
                $jabatan = $_POST['jabatan'];
                $status = $_POST['status'];
                $anak = $_POST['jmlAnak'];
                $gapok = 0;
                $zaprof;
                $tekan = $_POST['proses'];
                

                //TENTUKAN gapok
                switch ($jabatan){
                    case 'Manager' : $gapok = 20000000; break;
                    case 'Assisten' : $gapok = 15000000; break;
                    case 'Kabag'   : $gapok = 10000000; break;
                    case 'Staff'   : $gapok = 4000000; break;
                    default: $gapok=0;
                }

                $tunjab = 0.2 * $gapok;
                $tunkel = 0;
                //TENTUKAN TUNJANGAN KELUARGA
                if($status =='Menikah'  && $anak >= 1  && $anak <= 2) $tunkel = 0.05 * $gapok;
                else if($status =='Menikah'  && $anak >= 3  && $anak <= 5) $tunkel= 0.1 * $gapok;
                else if($status =='Menikah'  && $anak >  5 ) $tunkel = 0.15 * $gapok;
                else $tunkel=0;
                
                $gakot = $gapok + $tunjab + $tunkel;

                $zaprof = ($agama == 'Muslim' && $gakot >= 6000000) ? 0.025 * $gakot : 0;
                $takeHomePay = $gakot - $zaprof;

                
                if(isset($tekan)){ ?>
                        <table class="table table-info">
                    <thead>
                        <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jumlah Anak</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Tunjangan Jabatan</th>
                        <th scope="col">Tunjangan Keluarga</th>
                        <th scope="col">Gaji Kotor</th>
                        <th scope="col">Zakat Profesi</th>
                        <th scope="col">Take Home Pay</th>
                        </tr>  
                </thead>

                <tbody>
                <tr>
                <td><?= $nama ?></td>
                <td><?= $agama ?></td>
                <td><?= $jabatan ?></td>
                <td><?= $status ?></td>
                <td><?= $anak ?></td>
                <td><?= number_format($gapok,2,',','.');?></td>
                <td><?= number_format($tunjab,2,',','.');?></td>
                <td><?= number_format($tunkel,2,',','.');?>
                <td><?= number_format($gakot,2,',','.');?></td>
                <td><?= number_format($zaprof,2,',','.');?></td>
                <td><?= number_format($takeHomePay,2,',','.');?></td>
                </tr>  
                </tbody>
            </table>
                    <?php } ?>
     </div>
     </body>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>