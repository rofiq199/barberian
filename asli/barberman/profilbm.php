<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin1.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>HALAMAN LIHAT PROFIL</title>
  </head>
  <body>
  <?php
	// Load file koneksi.php 
	$koneksi = mysqli_connect("localhost","root","","barberian");
	
	// Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	session_start();
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$username = $_SESSION['usernamebm'];
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM data_barberman  WHERE username_bm='".$username."'";
	$sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  $bs =$data['username_bs'];
  $query1 = "SELECT * FROM data_barber  WHERE username_bs='".$bs."'";
	$sql1 = mysqli_query($koneksi, $query1);  // Eksekusi/Jalankan query dari variabel $query
  $data1 = mysqli_fetch_array($sql1); // Ambil data dari hasil eksekusi $sql
	?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <a class="navbar-brand text-white" href="../index.php">BARBERIAN</a>
          <i class="fas fa-bars"></i> 
        </button>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            
            </form>
            <div class="icon ml-4">
                <h5>
                    <i class="fas fa-sign-out-alt mr-3 text-white" onclick="window.location.href='../logout.php'" data-toggle="tooltip" title="Sign Out"></i>
                </h5>
  
            </div>
        </nav>

      <div class="row no-gutters mt-5">
      <div class="col-md-2,5 bg-dark mt-2 pt-4 ">
              <ul class="nav flex-column">
                  <ul class="nav flex-column">
                      <ul class="sidebar navbar-nav">    
                           <li class="nav-item">
                                <a class="nav-link active text-white" href="Order.php"><i class="fas fa-tags mr-2"></i>LIHAT ORDERAN</a><hr class="bg-secondary">
                           </li>
                           <li class="nav-item">
                                <a class="nav-link active text-white" href="profilbm.php"><i class="fas fa-user mr-2"></i>LIHAT PROFIL</a><hr class="bg-secondary">
                           </li>
                           <li class="nav-item">
                                <a class="nav-link text-white" href="history.php"><i class="fas fa-history mr-2"></i>HISTORY ORDER</a><hr class="bg-secondary">
                           </li>
                    </ul>
        </div>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-user-edit mr-2"></i>LIHAT PROFIL</h3><hr>

            <form class="md-form" method="POST" action="pprofilbm.php" enctype="multipart/form-data" >
              <div class="file-field">
                <div class="mb-4">
                  <center><img src="img/<?php echo $data['foto_bm']; ?>"
                    width = 240px height = 240px class="rounded-circle z-depth-1-half avatar-pic" ><center>
                </div>
                <div class="d-flex justify-content-center">
                  <div class="btn btn-mdb-color btn-rounded float-left">
                    <span>Add photo</span>
                    <input type="file" name="foto">
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-group col-md-6">
                <label for="inputemail4">USERNAME BARBERMAN</label>
                <p><?php echo $data['username_bm']; ?></p>
              </div>              
              <div class="form-group col-md-6">
                <label for="barbershop">BARBERSHOP</label>
                <p><?php echo $data1['nama_bs']; ?></p>
              </div>
              <div class="form-group col col-md-6">
                <label for="inputEmail4">NAMA LENGKAP</label>
                <input type="text" class="form-control" id="inputname" name="nama" value="<?php echo $data['nama_bm']; ?>" >
              </div>
              <div class="form-group col-md-6">
                <label for="email">E-MAIL</label>
                <input type="email" class="form-control" id="inputEmail14" name="email" value="<?php echo $data['email_bm']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputCity">ALAMAT</label>
                <input type="text" class="form-control" id="inputAddress2" name="alamat" value="<?php echo $data['alamat_bm']; ?>">
              </div>
              <div class="form-group col-md-6">
              <label for="inputAddress2">NOMOR TELEPON</label>
              <input type="tel" pattern="^\d{>9}" title="masukkan angka minimal 10" class="form-control" name="no" value="<?php echo $data['no_bm']; ?> " required>
              </div>
            <div class="form-group col-md-6">
                <label for="inputPassword6">PASSWORD</label>
                <input type="password" id="password" class="form-control" name="password" value="<?php echo $data['password_bm']; ?>">
                <div></div>
                <label for="inputPassword6"> Konfirmasi Password</label>
                <input type="password" id="konpassword" class="form-control" name="password1"  value="<?php echo $data['password_bm']; ?>" placeholder="Masukkan Ulang Password Baru">
                <small id="passwordHelpInline" class="text-muted">
                  <strong id="ingat"></strong>
                </small>
            </div>
            <div class="form-group col-md-6">
            <button type="submit" id="ubah" class="btn btn-primary">Ubah</button>
            <button type="reset" class="btn btn-danger mb"> Batal</button>
          </form>
          
           

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin1.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            $("#ubah").on('click',function () {
                var password = $("#password").val();
                var confirmPassword = $("#konpassword").val();
                if (password != confirmPassword) {
                    // alert("Passwords do not match.");
                    $('#ingat').append("Konfirmasi Password Tidak Sesuai !!!!");
                    return false;
                }
                return true;
            });
        });    
    </script>
  </body>
</html>