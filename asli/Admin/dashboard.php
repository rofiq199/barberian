<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin2.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>HALAMAN DASHBOARD</title>
  </head>
  <body>
  <?php
      // Load file koneksi.php 
      include "../koneksi.php";
      include "navbar.php";
      // Ambil data NIS yang dikirim oleh index.php melalui URL
      $username = $_SESSION['usernamebs'];
      // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
      $query = "SELECT * FROM antrian  WHERE username_bs='".$username."'";
      $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
      $jumlah = mysqli_num_rows($sql);
      ?>
                <div class="col-md-8 p-5 pt-2">
                <h3><i class="fas fa-cart-arrow-down mr-2"></i>DASHBOARD</h3><hr>

            <!-- Icon Cards-->
            <div class="row text-white">
            <div class="card bg-info ml-3" style="width: 18rem;">
            <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-shopping-bag"></i>
            </div>
            <h5 class="card-title">BARANG TERJUAL</h5>
            <div class="display-4">3</div>
            
          </div>
      </div>

            <div class="card bg-danger ml-3" style="width: 18rem;">
            <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-money-check-alt"></i>
            </div>
            <h5 class="card-title">Jumlah Antrian</h5>
            <div class="display-4"><?php  echo $jumlah; ?></div>
            
          </div>
      </div>
      <div class="form-group col-md-10">
      </div>
      <div class="form-group col-md-10">
      <button type="button" class="btn btn-primary btn-sm">BUKA</button>
      <button type="button" class="btn btn-danger btn-sm">TUTUP</button>
      
        <!-- Akhir form tambah -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.4.1.min.js" ></script>
    <script src="../js/jquery.mask.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin2.js"></script>
    <!-- <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '#harga' ).mask('000.000.000', {reverse: true});

            })
        </script> -->
  </body>
</html>

        

