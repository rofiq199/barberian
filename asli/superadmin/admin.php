<!doctype html>
<html lang="en">
  <?php 
  include "../koneksi.php";
  session_start();
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $username = $_SESSION['username'];
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM antrian  WHERE ( status_antrian='belum' or status_antrian='proses') and username_bs='".$username."' ";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin2.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>HALAMAN ANTRIAN</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand text-white" >BARBERIAN</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i> 
        </button>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            
            </form>
            <div class="icon ml-4">
                <h5>
                    <a href="../logout.php" class="fas fa-sign-out-alt mr-3 text-white" data-toggle="tooltip" title="Sign Out"></a>
                </h5>
  
            </div>
        </nav>

      <div class="row no-gutters">
      <div class="col-md-2,5 bg-dark  pt-4 ">
              <ul class="nav flex-column">
                      <ul class="sidebar navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link active text-white" href="produk.php"><i class="fas fa-tags mr-2"></i>LIHAT PRODUK</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="barberman.php"><i class="fas fa-store mr-2"></i>LIHAT BARBERMAN</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="profil.php"><i class="fas fa-user-edit mr-2"></i>UBAH PROFIL</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="antrian.php"><i class="fas fa-money-check mr-2"></i>LIHAT ANTRIAN</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="listharga.php"><i class="fas fa-dollar-sign mr-3 ml-2"></i>LIST HARGA</a><hr class="bg-secondary">
                        </li>
                    </ul>
        </div>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-money-check mr-2"></i> Lihat Antrian</h3><hr>
          <a href="#modalplus" class="btn btn-primary mb-3" data-toggle="modal"><i class="fas fa-plus-square mr-2"></i>Tambah Antrian</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Antrian</th>
                <th scope="col">Status Antrian</th>
                <th colspan="3" scope="col">STATUS</th>
              </tr>
            </thead>
            <tbody>
        <?php 
          $no = 1;
          while($data = mysqli_fetch_array($sql)){ ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $data['username_cs']; ?></td>
                <td><?php echo $data['no_antrian']; ?></td>
                <td><?php echo $data['status_antrian']; ?></td>
                <?php if ($data['status_antrian'] == 'belum'){ ?>
                  <td><a href="antrianproses.php?act=proses&amp;id=<?php echo $data['kode_antrian'] ;?>&amp;ref=antrian.php" class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Proses">Proses</a></td>
                <td><a href="antrianproses.php?act=batal&amp;id=<?php echo $data['kode_antrian'] ;?>&amp;ref=antrian.php" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Batal">Batal</a></td>
                <?php }else{ ?>
                  <td><a href="antrianproses.php?act=selesai&amp;id=<?php echo $data['kode_antrian'] ;?>&amp;ref=antrian.php" class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Selesai">Selesai</a></td>
                <td><a href="antrianproses.php?act=batal&amp;id=<?php echo $data['kode_antrian'] ;?>&amp;ref=antrian.php" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Batal">Batal</a></td>
                <?php } ?>
              </tr>
        <?php }?>

        <form  action="" method="" enctype="multipart/form-data">
      <div class="modal fade" id="modalplus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Tambah Antrian
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-2 my-3">
              <div class="md-form mb-2">
                <input type="username" id="nomor_antrian" class="form-control validate"  name="antri1" placeholder="Nomor Antrian">
              </div>
              <div class="md-form mb-2">
                <input type="username" id="nama" class="form-control validate" name="nama1" placeholder="Nama Pelanggan">
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