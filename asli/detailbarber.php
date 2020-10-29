<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="script.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    
        <!--My CSS-->
        <link rel="stylesheet" href="DetailBarber.css">
        <title>Barberian</title>
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
        <?php include "navbar.php";?>
    </head>
    <body>
<?php $id = $_GET['id'];?>
  <?php  
    include "koneksi.php";
    $query= "SELECT * from  data_barber where username_bs='".$id."'";
     $result=mysqli_query($koneksi,$query);
     $data = mysqli_fetch_object($result);
  ?>
          <div class="container">
            <img src="Admin/img/<?=$data -> foto; ?>" alt="">
          
          </div>           
                <!--/.Carousel Wrapper-->
        <div class="container">
                <h2 class="Deskripsi mt-3"><?=$data -> nama_bs;?></h2>
        </div>
        <div class="container">
        <div class="tombol">
          <button type="button" class="btn btn-primary mt-3 "  data-toggle="modal" data-target="#modalambil" >Ambil Antrian</buutton>
          <button type="button" class="btn btn-success mt-3 ml-2 " onclick="window.location.href='#barberman'" >Order</button>
        </div>
      </div>
        <!-- Section: Team v.1 -->
<div class="container">
<section class="text-center my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold my-5" id="barberman">List Barberman</h2>
        <!-- Section description -->
        <!-- Grid row -->
        <div class="row">
        
        <?php 
        include "koneksi.php";
        $query1= "SELECT * from  data_barberman where username_bs='$id' ";
        $result1=mysqli_query($koneksi,$query1) or die(mysqli_error());

        while($rows=mysqli_fetch_object($result1)){
        ?>
          <!-- Grid column -->
          
        <div class="col-sm-3">

        <div class="card center <?=$rows -> username_bm?>">
            <img src="barberman/img/<?=$rows -> foto_bm;?>" width ="170px" height="250px"class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?=$rows -> nama_bm?></h5>
              <p class="card-text"><?=$rows -> email_bm?></p>
              <a href="pesan.php?id=<?=$rows -> username_bm;?>" class="btn btn-primary pesan">Order</a>
            </div>
          </div>
        </div>
        <?php }?>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      
</section>
</div>

<!-- modal -->
<div class="modal fade" id="modalambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Apakah anda yakin akan mengambil antrian ?
      </div>
      <div class="modal-footer">
        <button type="button" onclick="window.location.href='antrian.php?id=<?php echo $id ;?>'" class="btn btn-primary">iya</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">tidak</button>
      </div>
    </div>
  </div>
</div>

      <!-- Section: Team v.1 -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    </body>
    </html>