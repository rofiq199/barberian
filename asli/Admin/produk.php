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
    <title>HALAMAN LIHAT PRODUK</title>
  </head>
  <body>
  <?php
      // Load file koneksi.php 
      include "../koneksi.php";
      include "navbar.php";
      // Ambil data NIS yang dikirim oleh index.php melalui URL
      $username = $_SESSION['usernamebs'];
      // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
      $query = "SELECT * FROM produk  WHERE username_bs='".$username."'";
      $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
      ?>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-tags mr-2"></i> LIHAT PRODUK</h3><hr>
          <a class="btn btn-primary mb-3"data-toggle="modal" data-target="#modalplus" title="plus" ><i class="fas fa-plus-square mr-2"></i>Tambah Produk</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">FOTO PRODUK</th>
                <th scope="col">NAMA BARANG</th>
                <th scope="col">HARGA</th>
                <th scope="col">STOK</th>
                <th colspan="3" scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
               while ($data = mysqli_fetch_assoc($sql)){ ?>
              <tr>
                <td><?php echo $no++?></td>
                <td><img src= "img/<?php echo $data['foto_produk'];?>" width = 50px height = 50px ></td>
                <td><?php echo $data['nama_produk'];?></td>
                <td>RP <?php echo $data['harga_produk'];?></td>
                <td><?php echo $data['stok'];?></td>
                <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal" data-target="#modaledit<?php echo $no?>" title="Edit"></i></td>
                <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="modal" data-target="#modalhapus<?php echo $no ?>"title="Delete"></i></td>
              </tr>
          
          <!-- Modal hapus barang -->
        <form action="produkh.php" method="POST">
        <div class="modal fade" id="modalhapus<?php echo $no ?>"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda ingin menghapus produk ini?</p>
              <input type="hidden" value="<?php echo $data['kode_produk'];?>" name="kode2">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" >Hapus </button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      </form>
          <!-- Modal edit barang -->
      <form action="produke.php" method="POST" enctype="multipart/form-data">
      <div class="modal fade" id="modaledit<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Edit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
            <div class="md-form mb-4">
               <br>
                <input type="file" name="foto" >
              </div>
            <div class="md-form mb-2">
                <input type="hidden" value="<?php echo $data['kode_produk'];?>" name="kode">
              </div>
              <div class="md-form mb-2">
                <input type="username" id="defaultForm-email" class="form-control validate" value="<?php echo $data['nama_produk'];?>" name="nama" placeholder="Nama Produk">
              </div>
              <div class="md-form mb-2">
                <input type="username" id="defaultForm-email" class="form-control validate" value="<?php echo $data['harga_produk'];?>" name="harga" placeholder="Harga Produk">
              </div>
              <div class="md-form mb-2">
                <input type="text" id="defaultForm-email" class="form-control validate" value="<?php echo $data['stok'];?>" name="stok" placeholder="Masukkan Jumlah Stok">
              </div>
              
            </div>
            <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      </form> 
      <?php }?>
        <!-- Modal tambah barang -->
      <form  action="produkt.php" method="POST" enctype="multipart/form-data">
      <div class="modal fade" id="modalplus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Tambah Produk
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
            <div class="md-form mb-4">
               <br>
                <input type="file" name="foto1" >
              </div>
              <div class="md-form mb-2">
                <input type="username" id="nama" class="form-control validate"  name="nama1" placeholder="Nama Produk">
              </div>
              <div class="md-form mb-2">
                <input type="username" id="harga" class="form-control validate" name="harga1" placeholder="Harga Produk">
              </div>
              <div class="md-form mb-2">
                <input type="text" id="harga" class="form-control validate" name="stok1" placeholder="Masukkan Jumlah Stok">
              </div>
              
            </div>
            <div class="modal-footer d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      </form>  
    </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin2.js"></script>
  </body>
</html>