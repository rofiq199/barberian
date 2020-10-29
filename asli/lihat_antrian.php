<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="lihat_antrian.css">
    <title>Barberian</title>
    <?php include "koneksi.php" ;
include "navbar.php";
?>
  </head>
  <body>
    <?php      
     $query= "SELECT * from  antrian where username_cs='".$_SESSION['username']."'and status_antrian='belum' ORDER BY kode_antrian DESC";
     $result=mysqli_query($koneksi,$query);
     ?>
    <!-- Form -->
    <form action="" method="POST" name="form1" enctype="multipart/form-data" class="mt-5" >
    <div class="container">
    <?php 
     $data = mysqli_fetch_array($result);
     $barber = $data['username_bs'];
     $query1= "SELECT * from  antrian where username_bs='".$barber."'and (status_antrian='proses' or status_antrian='selesai') ORDER BY no_antrian DESC ";
     $result1=mysqli_query($koneksi,$query1);
     $data1 = mysqli_fetch_array($result1);
    ?>
           <div class="form-group row">
              <label for="nomor" class="col-sm-2 col-form-label">Nomor Antrian sekarang :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nomor" disabled value="<?php echo $data1['no_antrian']; ?>" >
              </div>
            </div>
            <div class="form-group row">
              <label for="nomor2" class="col-sm-2 col-form-label">Nomor Antrianmu : </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nomor2" disabled value="<?php echo $data['no_antrian']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_barber" class="col-sm-2 col-form-label">Nama Barbershop :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_barber" disabled value="<?php echo $data['username_bs']; ?>">
              </div>
            </div>
            <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-danger mb-2">Batal</button>
            </div>
      
    </div>
    </form>
    <!-- akhir Form -->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>