<!doctype html>
<?php include "koneksi.php";
?>
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
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|IBM+Plex+Sans&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="regcustomer.css">
    <script  href="script.js"></script>
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
                  <a class="dropdown-item" href="hisbeli.php" >History Order</a>
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
          <input type="checkbox" class="lihatbm" id="showbm"><label >Show password</label>
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

    <!-- Form -->
    <form action="regcustomerp.php" method="POST" name="form1" enctype="multipart/form-data" >
    <div class="container">
        <h3 class="text-center">Form Pendaftaran</h3>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-plaintext" name="foto" id="foto">
                </div>
            </div>
        
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="">
              </div>
            </div>
            <div class="form-group row">
                    <label for="alamat"  class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="alamat" rows="3"></textarea>
                    </div>
            </div>
            <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="tel" pattern="^/d{>9}" title="masukkan angka minimal 10" class="form-control" name="no" value="">
                    </div>
                  </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" pattern="(?=.*/d)(?=.*[a-z]).{>7}" title="Password minimal harus 8!!!" class="form-control" id="password2" placeholder="Password" value='' name="password">
                    </div>
            </div>
            <div class="form-group row"> 
                <label for="ConPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label> 
                <div class="col-sm-10"> 
                    <input type="password" id="konpassword2" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" value="" data-bv-notempty='true' data-bv-notempty-message='The password confirmation is required and cannot be empty' data-bv-identical='true' data-bv-identical-field='password' data-bv-identical-message='The password and its confirmation are not the same' /> 
                    <small class="form-text text-muted">Ulangi password diatas sekali lagi. <br> <strong id="ingat"></strong></small> 
                </div> 
            </div>  
            <div class="col-sm-10 offset-sm-2">
                    <button type="submit" id='simpan' class="btn btn-success mb-2">Simpan</button>
            </div>
          </form>
    </div>
    <!-- akhir Form -->
  <!-- akhir Navbar -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            $("#simpan").on('click',function () {
                var password = $("#password2").val();
                var confirmPassword = $("#konpassword2").val();
                var foto =$('#foto').val();
                if(foto == ""){
                  alert('foto harap diisii!!!');
                  return false;
                }else if (password != confirmPassword) {
                    // alert("Passwords do not match.");
                    $('#ingat').append("Konfirmasi Password Tidak Sesuai !!!!");
                    return false;
                }else{
                return true;
                }
            });
        });    
    </script>
  </body>
</html>