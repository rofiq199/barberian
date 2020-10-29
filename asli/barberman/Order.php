<!doctype html>
<html lang="en">
  <head>
    <?php 
    include "../koneksi.php";
    session_start();
  $username = $_SESSION['usernamebm'];
  $query = "SELECT * FROM pesan inner join data_customer on pesan.username_cs=data_customer.username_cs  WHERE ( status_pesan='belum' or status_pesan='proses') and username_bm='".$username."' ";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  $jumlah =mysqli_num_rows($sql);
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin1.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>ORDERAN</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand text-white" href="file:///C:/xampp/htdocs/template_admin/Admin_Barberman.html">BARBERIAN</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i> 
          </button>
          <form class="form-inline my-2 my-lg-0 ml-auto">
            
          </form>
          <div class="icon ml-4">
              <h5>
                  <i onclick="window.location.href='../logout.php'" class="fas fa-sign-out-alt mr-3 text-white" data-toggle="tooltip" title="Sign Out"></i>
              </h5>

          </div>
        </div>
      </nav>

      <div class="row no-gutters mt-5">
        <div class="col-md-2,5 bg-dark mt-2 pt-4">
            <ul class="nav flex-column">
                <ul class="nav flex-column">
                    <ul class="sidebar navbar-nav">
                         <li class="nav-item">
                              <a class="nav-link active text-white" href=""><i class="fas fa-tags mr-2"></i>LIHAT ORDERAN <span class = "badge badge-danger"><?php echo $jumlah; ?></span></a><hr class="bg-secondary">
                         </li>
                         <li class="nav-item">
                              <a class="nav-link active text-white" href="profilbm.php"><i class="fas fa-user mr-2"></i>LIHAT PROFIL</a><hr class="bg-secondary">
                         </li>
                         <li class="nav-item">
                              <a class="nav-link text-white" href="History.php"><i class="fas fa-history mr-2"></i>HISTORY ORDER</a><hr class="bg-secondary">
                         </li>
                  </ul>
        </div>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-list-alt mr-2"></i> LIHAT ORDERAN</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama customer</th>
                <th scope="col">Jenis layanan</th>
                <th scope="col">Total</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th colspan="3" scope="col">Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          $no = 1;
          while($data = mysqli_fetch_array($sql)){ ?>
              <tr>
                  <th scope="row"><?php echo $no++; ?></th>
                  <td><?php echo $data['nama_cs']; ?></td>
                  <td><?php 
                  $kode = $data['kode_pesan'];
                  $query1 ="SELECT * FROM detail_pesan join harga_barber on detail_pesan.kode_ck=harga_barber.kode_ck where kode_pesan='$kode'"; 
                  $sql1 = mysqli_query($koneksi,$query1);
                  while($data2=mysqli_fetch_array($sql1)){
                    echo $data2['nama_ck'].',';  
                  }
                  ?></td>
                  <td>Rp. <?php echo number_format($data['total_pesan'],0,",","."); ?></td>
                  <td><?php echo $data['alamat_pesan']; ?></td>
                  <td><?php echo $data['status_pesan']; ?></td>
                  <?php if($data['status_pesan']=='belum'){?>
                  <td><i class="fas fa-check bg-success p-2 text-white rounded" data-toggle="tooltip" title="Terima" onclick="window.location.href='orderproses.php?act=proses&amp;id=<?php echo $data['kode_pesan'];?>&amp;ref=order.php'">terima</i></td>
                  <td><i class="fas fa-ban bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Tolak" onclick="window.location.href='orderproses.php?act=batal&amp;id=<?php echo $data['kode_pesan'];?>&amp;ref=order.php'" ></i></td>
                  <?php }else{ ?>
                  <td><i class="fas fa-check bg-success p-2 text-white rounded" data-toggle="tooltip" title="Selesai" onclick="window.location.href='orderproses.php?act=selesai&amp;id=<?php echo $data['kode_pesan'];?>&amp;ref=order.php'">selesai</i></td>
                  <td><i class="fas fa-ban bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Batal"  onclick="window.location.href='orderproses.php?act=batal&amp;id=<?php echo $data['kode_pesan'];?>&amp;ref=order.php'" ></i></td>
                  <?php }?>
                </tr>
          <?php }?>
            </tbody>
          </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin1.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  </body>
</html>