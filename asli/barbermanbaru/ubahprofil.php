
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>

    <title>Barberian</title>
  </head>
  <?php
  include "../koneksi.php";
  include "sidebar.php";
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
    <div class="content">
   		<nav class="navbar navbar-expand-lg">
   			<i class="fas fa-align-justify" id="sidebarCollapse"></i>
   		
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="far fa-bell"></i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>
<h3><i class="fas fa-user-edit mr-2"></i>LIHAT PROFIL</h3><hr>

            <form class="md-form" method="POST" action="fungsiprofil.php" enctype="multipart/form-data" >
              <div class="file-field">
                <div class="mb-4">
                  <center><img src="../barberman/img/<?php echo $data['foto_bm']; ?>"
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
            <button type="reset" class="btn btn-danger mb-2"> Batal</button>
          </form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
        });  
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