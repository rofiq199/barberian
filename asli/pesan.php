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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!--My CSS-->
    <link rel="stylesheet" href="testing.css">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    <!-- <script src="pesan.js"></script> -->
    <title>Barberian</title>
    <?php include "navbar.php" ;?>
  </head>
        <body>
        <?php 
          include "koneksi.php";
          $id = $_GET['id'];
          $total = 0;
          //print_r($_SESSION['cukur']);
          $query1= "SELECT * from  data_barberman where username_bm='$id' ";
          $result1 = mysqli_query($koneksi,$query1) or die(mysqli_error());
          $data1 = mysqli_fetch_array($result1);
          $barbershop = $data1['username_bs'];
          $nama = $data1['nama_bm'];

          $query = "SELECT * from  harga_barber where username_bs='$barbershop' ";
          $result= mysqli_query($koneksi,$query) or die(mysqli_error());
          
        ?>
<?php  if (isset($_SESSION['cukur'])){ ?>
<table hidden>
    <tr>
    <td>kode ck</td>
    <td>nama cukur</td>
    <td>harga</td>
    </tr>
    <?php   foreach ($_SESSION['cukur'] as $key => $val){
       $query2 = "SELECT * from  harga_barber where username_bs='$barbershop' and kode_ck = '$key' ";
       $result2= mysqli_query($koneksi,$query2) ;
       $tampil = mysqli_fetch_array($result2);
       $total += $tampil['harga_ck'];
      ?>
    <tr>
    <td><?php echo $key; ?></td>
    <td><?php echo $tampil['nama_ck']; ?></td>
    <td><?php echo $tampil['harga_ck'] ?></td>
    </tr>
    <?php }
    }?>
    </table>
    </div>
    <div class="container">
    <form action="pesan2.php?id=<?php echo $id ?>" method="POST">
        <div class="row">
            <div class="col-md-4 mt-2">
              
              <label for="inputCustomer4">Nama Customer</label>
              <input type="text" class="form-control" id="masukan4" disabled value="<?php echo $_SESSION['username']; ?>">
              <label for="inputBarberman4" class="mt-1">Nama Barberman</label>
              <input type="text" class="form-control" id="masukan4" disabled value="<?php echo $nama; ?>">
              <label for="inputCity">Alamat</label>
              <input type="text" class="form-control" name="alamat"  placeholder="Masukkan Alamat Lengkap..">
            </div>
            <div class="col-md-8 mt-2">
              <div class="container"> 
                <center>  <h3>Paket Potong</h3></center>
                <div class="garis"></div>
                <div class="row">
                  <div class="col mt-2">
                  <table id="dt-basic-checkbox" cellspacing="2" width="85%">
                    <tr>
                    <td>Aksi</td>
                    <td>Nama Layanan</td>
                    <td>Harga</td>
                    </tr>
                    <?php while($data=mysqli_fetch_array($result)) {
                      //print_r($data);?>
                    <tr>
                    <td>
                    <a href="pesan1.php?act=del&amp;barang_id=<?php echo $data['kode_ck']; ?>&amp;ref=pesan.php?id=<?php echo $id ?>" class="fas fa-times"></a>  <a class="fas fa-check " href="pesan1.php?act=add&amp;barang_id=<?php echo $data['kode_ck']; ?>&amp;ref=pesan.php?id=<?php echo $id ?>"></td>
                    <td><?php echo $data['nama_ck']; ?></td>
                    <td>Rp. <?php echo number_format($data['harga_ck'],0,",","."); ?></td>
                    </tr>
                  <?php }?>
                  </table>
                  <div class="garis"></div>
                  </div>
                  
                <div class="row">
                  <div class="col ml-3">
                      Biaya Tambahan
                    <div class="mt-2">
                      Biaya Total
                    </div>
                  </div>
                  <div class="col ml-5">
                      Rp 5.000
                    <div class="mt-2">
                      Rp <?php echo $total+'5000'; ?>
                    </div>
                    <small><strong><label class="mt-2">Aplikasi ini Hanya berlaku untuk daerah banyuwangi kota saja</label></strong></small>
                    <button type="button" data-toggle="modal" data-target="#modalubah" class="btn btn-outline-success waves-effect mt-4 ml-4">Pesan</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalubah"tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin melanjutkan transaksi?</p>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="total" value="<?php echo $total+'5000' ?>">
                      <button type="submit" class="btn btn-success" >Ya</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
  </body>
</html>