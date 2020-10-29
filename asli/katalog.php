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
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="katalog.css">
    <title>Barberian</title>
  </head>
  <body>
 <!--Navbar-->
  <?php session_start();
  ?>
 <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.php">Barberian</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="index.php">Tentang Kami</a>
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
              <?php if(!isset($_SESSION['username'])){
                ?>
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
                    <?php echo $_SESSION['username'];?>
                  </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href='profilcs.php'>Profil</a>
                  <a class="dropdown-item" href="hisbeli.php" >Histori Pembelian</a>
                  <a href="hispesan.php" class="dropdown-item">Histori Pemesanan</a>
                  <a class="dropdown-item" href="lihat_antrian.php" >Lihat Antrian</a>
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
    </div>
  </div>
    <!--/.Content-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/formvalidasi.js"></script>


  <!-- Jumbotron -->
        <div class="container">
          <h1 class="display-4 katalog">KATALOG</h1>
          <h1 class="display-4">#CARIGAYARAMBUTMUDISINI</h1>
          <section class="team-section text-center my-5">

            <!-- Grid row -->
            <div class="row">
          
              <!-- Grid column -->
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <!-- Masukkan Gambar disini -->
                  <img src="spike.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                  <!--  -->
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">SPIKE</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="undercut.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">UNDERCUT</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <!-- Masukkan gambar disini -->
                  <img src="army.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                  <!--  -->
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">ARMY</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="bald.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">BALD</h5>
              </div>
            <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="fading.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">FADING</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="messy.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">MESSY</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="mohawk.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">MOHAWK</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="avatar mx-auto">
                  <img src="pompadour.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                    alt="Sample avatar">
                </div>
                <h5 class="font-weight-bold mt-4 mb-3">POMPADOUR</h5>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                  <div class="avatar mx-auto">
                    <img src="sidepart.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                      alt="Sample avatar">
                  </div>
                  <h5 class="font-weight-bold mt-4 mb-3">SIDEPART</h5>
                </div>
                <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                  <div class="avatar mx-auto">
                    <img src="twoblocks.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                      alt="Sample avatar">
                  </div>
                  <h5 class="font-weight-bold mt-4 mb-3">TWOBLOCKS</h5>
                </div>
                <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                    <div class="avatar mx-auto">
                      <img src="kim.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                        alt="Sample avatar">
                    </div>
                    <h5 class="font-weight-bold mt-4 mb-3">KIM JONG UN HARICUT</h5>
                  </div>
                  <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                    <div class="avatar mx-auto">
                      <img src="quiff.png" width="300px" height="310px" class="rounded-circle z-depth-1"
                        alt="Sample avatar">
                    </div>
                    <h5 class="font-weight-bold mt-4 mb-3">QUIFF</h5>
                  </div>
            </div>
        
        
    <!-- akhir Jumbotron -->
  </div>
</div>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>