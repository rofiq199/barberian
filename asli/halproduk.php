<!doctype html>
<html lang="en">
  <head>
  <?php 
   include "koneksi.php";
  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="halproduk.css">
    <title>Barberian</title>
    <?php  include  "navbar.php"; 
     $json = json_encode($_SESSION);?>
  </head>
  <body>
  <!-- tampilkan produk -->
  <div class="container">
    <div id="tampil"></div>
    <div class="card-body border mt-5">
       <a class="fas fa-shopping-cart" onclick="window.location.href='keranjang.php'"></a>
       <?php if(!isset($_SESSION['items'])){ ?>
       <span class = "badge badge-danger">0</span>
       <?php }else {
        ?>
        <span class = "badge badge-danger"><?php  echo count($_SESSION['items']);?></span>   
       <?php } ?>    
    </div>
    <div class="mt-5 row">
    <?php
      $query=" SELECT * from  produk join data_barber on produk.username_bs=data_barber.username_bs ";
      $result=mysqli_query($koneksi,$query) or die(mysqli_error());
      $no=1;
      //proses menampilkan data
      while($rows=mysqli_fetch_object($result)){
      ?>
        <div class="col-sm-4 mt-2" >
          <div class="card">
              <img src="admin/img/<?=$rows -> foto_produk;?>"class="card-img-top" alt="...">
            <div class="card-body">
              <input hidden type="text" id="produk" value="<?=$rows -> kode_produk?>">
              <h5 class="card-title"><?=$rows -> nama_produk;?></h5>
              <p class="card-text">Rp. <?=number_format($rows -> harga_produk, 0, ",", ".");?></p>
              <h6 class="card-title"><?=$rows -> nama_bs;?></h6>
              <button hidden id ="cari">meleh</button><br><br>
              <center><button class="add btn btn-success" onclick="window.location.href='pcart.php?act=add&amp;barang_id=<?=$rows->kode_produk?>&amp;ref=halproduk.php'"><i class="fa fa-shopping-cart" aria-hidden="true" ></i> Add</button></center>
            </div>
          </div>
        </div>
                <?php
                  }
                  ?>
              </div>
</div>
<!-- Error dimulai -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/keranjang.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>