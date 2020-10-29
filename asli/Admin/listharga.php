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
    <title>Halaman List Harga</title>
  </head>
  <body>
  <?php 
  include "../koneksi.php";
  include "navbar.php";
  $username = $_SESSION['usernamebs'];
  $query = "SELECT * FROM harga_barber  WHERE username_bs='".$username."'";
  $sql = mysqli_query($koneksi, $query); 
  ?>
    
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-dollar-sign mr-2"></i>List Harga</h3><hr>
          <a data-toggle='modal' data-target='#modaltambah' class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Harga</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Pelayanan</th>
                <th scope="col">Harga</th>
                <th colspan="3" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
               while($data= mysqli_fetch_array($sql)){ ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php  echo $data['nama_ck']; ?></td>
                <td>Rp. <?php  echo number_format($data['harga_ck'], 0, ",", "."); ?></td>
                <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal" data-target="#modaledit<?php echo $no?>" title="Edit"></i></td>
                <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="modal" data-target="#modalhapus<?php echo $no?>" title="Delete"></i></td>
              </tr>
              <!-- Form Edit -->
              <form action="listhargaproses.php?act=edit&amp;ref=listharga.php" method="POST">
                <div class="modal fade" id="modaledit<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Edit Harga 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                      <div class="md-form mb-2">
                          <input type="hidden" class="form-control validate" value="<?php  echo $data['kode_ck']; ?>" name="kode" placeholder="Nama pelayanan">
                        </div>
                      <div class="md-form mb-2">
                          <input type="text" class="form-control validate" value="<?php  echo $data['nama_ck']; ?>" name="nama" placeholder="Nama pelayanan">
                        </div>
                        <div class="md-form mb-2">
                          <input type="text" class="form-control validate" value="<?php  echo $data['harga_ck'];?>" name="harga" placeholder="Harga Pelayanan">
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
              <!-- Akhir form edit -->
                <!-- Form hapus -->
              <form action="listhargaproses.php?act=hapus&amp;ref=listharga.php" method="POST">
                <div class="modal fade" id="modalhapus<?php echo $no?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Hapus 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                      <div class="md-form mb-2">
                      <label>Apakah anda akan menghapus layanan ini?</label>
                          <input type="hidden" class="form-control validate" value="<?php  echo $data['kode_ck']; ?>" name="kode">
                        </div>              
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Hapus</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>  
              <!-- Akhir form hapus -->
              <?php }?>
              
            </tbody>
          </table>
             <!-- Form tambah -->
             <form action="listhargaproses.php?act=tambah&amp;ref=listharga.php" method="POST">
                <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Tambah Layanan 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                      <div class="md-form mb-2">
                          <input type="text" class="form-control validate"  name="nama" placeholder="Nama pelayanan">
                        </div>
                        <div class="md-form mb-2">
                          <input type="number" id="harga"class="form-control validate"  name="harga" placeholder="Harga Pelayanan">
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