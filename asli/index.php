<?php

  session_start();
?>
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
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="style.css">

    <title>Barberian</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">Barberian</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#tentang_kami">Tentang Kami</a>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Fitur Kami
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="katalog.php">Katalog</a>
                    <a class="dropdown-item" href="caribarber.php">Cari Barbershop</a>
                    <a class="dropdown-item" href="halproduk.php">Produk</a>
                  </div>
              </div>
              <?php if(!isset($_SESSION['username'])){ ?>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Masuk
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#darkModalForm">Masuk Sebagai Customer</a>
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalLoginForm">Masuk Sebagai Barbershop</a>
                  <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalForm">Masuk Sebagai Barberman</a>
                  </div>
            </div>
            <?php }else{
          ?>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['username']?>
                  </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href='profilcs.php'>Profil</a>
                  <a class="dropdown-item" href="hisbeli.php" >Histori Pembelian</a>
                  <a class="dropdown-item" href="hispesan.php">Histori Pemesanan</a>
                  <a class="dropdown-item" href="lihat_antrian.php" >Lihat Antrian</a>
                  <a class="dropdown-item" href="invoice.php">Lihat Pembelian</a>
                  <a class="dropdown-item" href="halamanpesan.php" >Lihat Pesan</a>
                  <a class="dropdown-item" href="logout.php" >Logout</a>
                </div>
            </div>
            <?php }
            ?>
          </div>
        </div>
    </div>
    </nav>
  <!-- akhir Navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Potong Rambutmu<br>Kapanpun Dan Dimanapun</h1>
      </div>
    </div>
  <!-- akhir Jumbotron -->
  <!-- Tentang Kami -->
  <div class="container" id="tentang_kami">
      <center>
        <h2 class="tentangkami">Tentang Kami</h2>
        <text class="penjelasan">Barberian adalah sistem informasi berbasis web yang bertema tempat potong rambut khusus pria atau yang biasa disebut "Barbershop". tujuan dari SI web Barberian ini adalah untuk memudahkan pelanggan maupun pihak barber.</text>
      </center>

    </div>
  
  <!-- akhir Tentang Kami -->
 
<!-- Fitur -->
<!-- Section: Features v.1 -->
<section class="text-center my-5 fitur">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold my-5">Apa Saja Fitur Kami?</h2>


  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-4" id="gambar">
      <h5 class="font-weight-bold my-4">Cari Barber</h5>
      <i class="fa fa-search fa-4x"></i>
      <p class="grey-text mb-md-0 mb-6">Fitur cari barber bertujuan memudahkan pelanggan untuk menemukan barber mana yang akan didatangi maupun order barberman.
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4" id="gambar">
      <h5 class="font-weight-bold my-4">Katalog</h5>
      <i class="fa fa-images fa-4x"></i>
      <p class="grey-text mb-md-0 mb-5">Fitur katalog adalah fitur yang menyediakan berbagai gaya rambut, tujuan dari fitur ini adalah memudahkan pelanggan untuk mencari referensi tentang gaya rambut apa yang ingin dicari.
      </p>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4" id="gambar">
      <h5 class="font-weight-bold my-4">Order</h5>
      <i class="fa fa-shopping-cart fa-4x"></i>
      <p class="grey-text mb-0">Fitur order adalah fitur untuk memanggil barberman untuk datang ke kediaman pelanggang, sehingga pelanggan tidak perlu datang ke barbershop langsung untuk potong rambut dll. Fitur oerder ini sangatlah cocok untuk para perkerja yang tidak memiliki banyak waktu untuk pergi memotong rambut.
      </p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Features v.1 -->
<!-- akhir Fitur -->
<!-- Modal -->
<div class="modal fade" id="darkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <form class="customer" action="login/ceklogin.php" method="POST">
    <div class="modal-content card card-image" id="popup">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>SIGN</strong> <a
              class="green-text font-weight-bold"><strong> IN</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
          <div class="md-form mb-5">
            <input type="username" id="username" name="username" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" id="username" value=""for="Form-email5">Your Username</label>
          </div>

          <div class="md-form pb-3">
            <input type="password" id="password" name="password" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" value=""for="Form-pass5">Your password</label>
          </div>
          <input type="checkbox" class="lihat" name="lihat" id="show"><label for="checkbox">Show password</label>

          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">

            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit" id="tombollogin" class="btn btn-success btn-block btn-rounded z-depth-1">Sign In</button>
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

          <!--Grid row-->
          <div class="row">

            <!--Grid column-->
            <div class="col-md-12">
              <p class="font-small white-text d-flex justify-content-end">Don't Have an account? <a href="regcustomer.php" class="green-text ml-1 font-weight-bold">
                  Sign Up</a></p>
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->

        </div>
      </div>
    </div>
    </form>
    <!--/.Content-->
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Contect-->
    <form action="Login/cekloginbs.php" method="POST">
    <div class="modal-content card card-image" id="popupp">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
    <!--Header-->
    <div class="modal-header text-center pb-4">
      <h3 class="modal-title w-100 white-text font-wight-bold" id="myModalLabel"><strong>SIGN</strong> <a
          class="green-text font-weight-bold"><strong>IN</strong></a></h3>   
        <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
      <!--Body-->
      <div class="md-form mb-5">
        <input type="username" id="usernamebs" class="form-control validate white-text" name="username">
        <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
        </div>

        <div class="md-form pb-3">
          <input type="password" id="passwordbs" class="form-control validate white-text" name="password" >
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>
        <input type="checkbox" class="lihatbs" id="showbs"><label >Show password</label>
        
        <!--Grid row-->
        <div class="row d-flex align-items-center mb-4">

        <!--Grid column-->
        <div class="text-center mb-3 col-md-12">
          <button type="submit" id="tombolloginbs" class="btn btn-success btn-block btn-rounded z-depth-1">Login</button>
        </div>
        <!--Grid column-->

        </div>
        <!--Grid row-->

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-12">
            <p class="font-small white-text d-flex justify-content-end">Don't Have an Account? <a href="#" class="green-text ml-1 font-weight-bold">
                Sign Up</a></p>
          </div>
          <!--Grid column-->

    </div>
    <!--Grid row-->

    </div>
      </div>
    </div>
    </form>
    <!--/.Content-->
  </div>
</div>  
<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <form action="/K3GOL_E/barberian/Login/cekloginbm.php " method="POST">
    <div class="modal-content card card-image" id="popuppp">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>SIGN</strong> <a
              class="green-text font-weight-bold"><strong> IN</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
          <div class="md-form mb-5">
            <input type="username" id="usernamebm" name="username" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-email5">Your email</label>
          </div>

          <div class="md-form pb-3">
            <input type="password" id="passwordbm" name="password" class="form-control validate white-text">
            <label data-error="wrong" data-success="right" for="Form-pass5">Your password</label>
          </div>
          <input type="checkbox" class="lihatbm" id="showbs"><label >Show password</label>
          <!--Grid row-->
          <div class="row d-flex align-items-center mb-4">

            <!--Grid column-->
            <div class="text-center mb-3 col-md-12">
              <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1" id="tombolloginbm">Sign In</button>
            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->


        </div>
      </div>
    </div>
    </form>
    <!--/.Content-->
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    <script src="js/formvalidasi.js"></script>
    <!-- <script type="text/javascript">
        function ajax_login(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var data = $('.customer').serialize();
            $.ajax({
                url:"login/ceklogin.php",
                type:"POST",
                data:{
                    username:username,
                    password:password
                },
                success:function(result){
                    //$("#hasil").html(result);
                    alert('berhasil login');
                    $('.navbar navbar-expand-lg navbar-light').load('navbar.php');
                    console.log(data);
                    // window.location.href="index2.php"
                }
            });
        }
    </script> -->
  </body>
</html>