<!doctype html>
<?php 
  include "koneksi.php" ;
    include "navbar.php";
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
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="profilcs.css">
    <title>Barberian</title>
  </head>
  <body>
    <?php 
    $username = $_SESSION['username']; 
    $query = "SELECT * FROM data_customer  WHERE username_cs='".$username."'";
    $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    ?>
    <!-- Form -->
    <form action="pprofilcs.php" method="POST" name="form1" enctype="multipart/form-data" >
    <div class="container">
        <h3>Ubah Profil</h3>
            <div class="gambar">
            <center><img  valign='bottom' src="img/<?php echo $data['foto_cs']; ?>"></center>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control-plaintext" name="foto" id="foto">
                </div>
            </div>
        
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="hidden" class="form-control" name="username" value="<?php echo $data['username_cs'];?>" ><p><?php echo $data['username_cs']; ?></p>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_cs']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="<?php echo $data['email_cs']; ?>">
              </div>
            </div>
            <div class="form-group row">
                    <label for="alamat"  class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" type="text" name="alamat" rows="3"><?php echo $data['alamat_cs']; ?></textarea>
                    </div>
            </div>
            <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" pattern="^/d{>9}" title="masukkan angka minimal 10" class="form-control" name="no" value="<?php echo $data['no_cs']; ?>">
                    </div>
                  </div>
            <div class="border"></div>
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="passwordcs" placeholder="Password" value=<?php echo $data['password_cs']; ?> data-bv-notempty='true' data-bv-notempty-message='The password is required and cannot be empty' data-bv-identical='true' data-bv-identical-field='password_confirmation' data-bv-identical-message='The password and its confirmation are not the same'>
                </div>
            </div>
            <div class="form-group row"> 
                <label for="ConPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label> 
                <div class="col-sm-10"> 
                    <input type="password" id="konpassword" class="form-control" placeholder="Konfirmasi Password" name="password1" value="<?php echo $data['password_cs']; ?>" data-bv-notempty='true' data-bv-notempty-message='The password confirmation is required and cannot be empty' data-bv-identical='true' data-bv-identical-field='password' data-bv-identical-message='The password and its confirmation are not the same' /> 
                    <small class="form-text text-muted">Ulangi password diatas sekali lagi.
                    <br>
                    <strong><p id="ingat"></p></strong></small> 
                </div> 
            </div>
            <div class="col-sm-10 offset-sm-2">
                    <button type="submit" id="ubah"class="btn btn-primary mb-2">Ubah</button>
                    <button type="reset" class="btn btn-danger mb-2">Batal</button>
            </div>
          </form>
    </div>
    <!-- akhir Form -->
  <!-- akhir Navbar -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
       $(document).ready(function() {
            $("#ubah").on('click',function () {
                var password = $("#passwordcs").val();
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