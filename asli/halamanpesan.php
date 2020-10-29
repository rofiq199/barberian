<!doctype html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="halamanpesan.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    <?php 
    include "navbar.php";
    include "koneksi.php";
    $query= "SELECT * from  pesan where username_cs='".$_SESSION['username']."'and status_pesan='belum' or status_pesan='proses' order by kode_pesan DESC";
    $result=mysqli_query($koneksi,$query);
    $tampil =mysqli_fetch_array($result);
    $kode= $tampil['kode_pesan'];
    $query1= "SELECT * from  detail_pesan INNER JOIN harga_barber ON detail_pesan.kode_ck = harga_barber.kode_ck where  kode_pesan='$kode'";
    $result1=mysqli_query($koneksi,$query1);
  ?>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Kode Pemesanan : <?php echo $tampil['kode_pesan']; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nama Barberman :<?php echo $tampil['username_bm']; ?></p>
                        <p class="card-text">Alamat :<?php echo $tampil['alamat_pesan']; ?> </p>
                        <p class="card-text">Jam Pesan : <?php echo date('H:i', strtotime($tampil['tanggal_pesan'])); ?></p>
                        <div class="card mb-2">
                            <div class="card-header">
                            <table cellspacing="2" width="85%">
                                <tr>
                                    <td>Nama Layanan</td>
                                    <td>Harga</td>
                                </tr>
                            </table>
                            </div>
                            <div class="card-body">
                            <table cellspacing="2" width="85%">
                            <?php while($data=mysqli_fetch_array($result1)){ ?>
                                <tr>
                                    <td><?php echo $data['nama_ck']; ?></td>
                                    <td>RP. <?php echo number_format($data['harga_ck'],0,',','.'); ?></td>
                                </tr>
                            <?php }?>
                            </table>
                            </div>
                            <p class="card-text">Status Pesan :<?php echo $tampil['status_pesan']; ?> </p>
                            <p class="card-text">Total :<?php echo $tampil['total_pesan']; ?> </p>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>