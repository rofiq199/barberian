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

    <!--My CSS-->
    <link rel="stylesheet" href="caribarber.css">
    <title>Barberian</title>
  </head>
  <body>
  <!-- Jumbotron -->
  <!-- Section: Blog v.3 -->
<?php include "koneksi.php";
      include "navbar.php";
      $jam = date('H:i:s', time()+60*60*6);
      echo $jam;
  ?>
<div class="container">
<form method="post" action="caribarber.php">
<div  type="text" name="search" id="search"class="input-group md-form form-sm form-2 pl-0 my-5">
  <input class="form-control my-0 py-1 amber-border" type="text" id='cari' name="search" placeholder="Cari Disini" >
  <div class="input-group-append">
    <button type="submit" value="search" class="input-group-text amber lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></button>
  </div>
</div>
</form>
<section class="my-5">
<div id="tampil"> 
<?php
if(isset($_POST['search'])){
$search = $_POST['search'];
$query=" SELECT * from  data_barber where nama_bs like '%$search%' ";
$result=mysqli_query($koneksi,$query) or die(mysqli_error());
$no=1;
}else{
  $query= "SELECT * from  data_barber ";
  $result=mysqli_query($koneksi,$query) or die(mysqli_error());
}
//proses menampilkan data
while($rows=mysqli_fetch_object($result)){
?>
  <!-- Grid row -->
  <div class="mt-3 card">
  <div class="card-body">
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5 col-xl-4">

      <!-- Featured image -->
      <div class="view overlay rounded mb-lg-0 mb-4">
        <img class="img-fluid" src="admin/img/<?=$rows -> foto;?>" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7 col-xl-8">

      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong><?=$rows -> nama_bs;?></strong></h3>
      <!-- Excerpt -->
      <p class="Deskripsi"><?=$rows -> alamat_bs;?><br>
      <?=$rows -> jam_buka;?>-<?=$rows -> jam_tutup;?></p>
      <!-- klik ke detail barbershop -->
      <?php if(($rows -> status_bs) == 'buka' && ($rows -> jam_buka) <= $jam && ($rows -> jam_tutup) >= $jam ){ ?>
      <button type = "button" class="btn btn-outline-primary btn-rounded waves-effect" onclick="window.location.href='detailbarber.php?id=<?=$rows -> username_bs;?>'">Lihat Detail</button>
      <p class="mt-5 status"><strong>Buka</strong><br>
      <?php }else{
        ?>
      <button type = "button" disabled class="btn btn-outline-secondary btn-rounded waves-effect" onclick="window.location.href='detailbarber.php?id=<?=$rows -> username_bs;?>'">Lihat Detail</button>
      <p class="mt-5 status"><strong>Tutup</strong><br>
    <?php }?>
      
    </div>
    <!-- Grid column -->
  </div>  
  </div>
  </div>
  <!-- Grid row -->
<?php
}
?>
</div>
</section>
</div>

<!-- Section: Blog v.3 -->
  <!-- akhir Jumbotron -->
  <ul id="result" ></ul>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    </body>
  </html>