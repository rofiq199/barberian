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
    <title>HALAMAN UBAH PROFIL</title>
  </head>
  <body>
      <?php
      // Load file koneksi.php 
      include "../koneksi.php";
      include "navbar.php";
      // Ambil data NIS yang dikirim oleh index.php melalui URL
      $username = $_SESSION['usernamebs'];
      // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
      $query = "SELECT * FROM data_barber  WHERE username_bs='".$username."'";
      $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
      $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
      ?>

        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-user-edit mr-2"></i>UBAH PROFIL</h3><hr>

            <form class="md-form" method="POST" action="pprofil.php" enctype="multipart/form-data">
              <div class="file-field">
                <div class="mb-4">
                  <center><img  src="img/<?php echo $data['foto']; ?>" height="250px" width="250px"
                    class="rounded-circle z-depth-1-half avatar-pic"><center>
                </div>
                <div class="d-flex justify-content-center">
                  <div class="btn btn-mdb-color btn-rounded float-left">
                    <span>Add photo</span>
                    <input type="file" name="foto">
                  </div>
                </div>
              </div>
              <div class="form-group">
              <div class="form-group col col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username"value="<?php echo $data['username_bs']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputnama">Nama Barbershop</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_bs']; ?>"">
              </div>
              <div class="form-group col-md-6">
                <label for="inputemail">Email Barbershop</label>
                <input type="email" class="form-control" name="email" value="<?php echo $data['email_bs']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputemail">Jam Buka</label>
                <input type="time" class="form-control" name="jambuka" value="<?php echo $data['jam_buka']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputemail">Jam Tutup</label>
                <input type="time" class="form-control" name="jamtutup" value="<?php echo $data['jam_tutup']; ?>">
              </div>  
            <div class="form-group col-md-6">
              <label for="inputAddress2">Nomor telepon</label>
              <input type="tel" pattern="^\d{>9}" title="masukkan angka minimal 10" class="form-control" name="no" value="<?php echo $data['no_bs']; ?>">
            </div>
            <div class="form-group">
              <div class="form-group col-md-6">
                <label for="addres2">Alamat</label>
                <input type="text" class="form-control"  name="alamat" value="<?php echo $data['alamat_bs']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword6">Password</label>
                <input type="password" id="password" class="form-control" name="password" value="<?php echo $data['password_bs']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword6">Konfirmasi Password</label>
                <input type="password" id="konpassword" class="form-control" name="password1" value="<?php echo $data['password_bs']; ?>">
                <label class="pesan"></label>
                <small id="passwordHelpInline" class="text-muted">
                  <strong id="ingat"></strong>
                </small>
            </div>
            <div class="form-group col-md-6">
            </div>
            <div class="form-group col-md-6">
            <button type="submit" id="ubah"class="btn btn-primary">SIMPAN PERUBAHAN</button>
          </form>
          
           

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.4.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin2.js"></script>
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