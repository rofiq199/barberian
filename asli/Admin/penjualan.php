<!doctype html>
<html lang="en">
  <?php 
  include "../koneksi.php";
  include "navbar.php";
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $name = $_SESSION['usernamebs'];
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query1 = "SELECT * FROM penjualan inner join detail_penjualan on penjualan.kode_jual=detail_penjualan.kode_jual join produk on detail_penjualan.kode_produk=produk.kode_produk where username_bs='$name' and (status_jual='belum' or status_jual='proses') ";
  $sql1 = mysqli_query($koneksi, $query1);  // Eksekusi/Jalankan query dari variabel $query
  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin2.css">
    <script src="https://kit.fontawesome.com/ef8e8d5793.js" crossorigin="anonymous"></script>
    <title>HALAMAN PENJUALAN</title>
  </head>
  <body>
        <div class="col-md-8 p-5 pt-2">
          <h3><i class="fas fa-money-check mr-2"></i> Lihat Pembelian Barang</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Status Pemesanan</th>
                <th colspan="3" scope="col">STATUS</th>
              </tr>
            </thead>
            <tbody>
        <?php 
          $no = 1;
          while($data1 = mysqli_fetch_array($sql1)){ ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $data1['username_cs']; ?></td>
                <td><?php echo $data1['nama_produk']; ?></td>
                <td><?php echo $data1['jumlah']; ?></td>
                <td><?php echo $data1['status_jual']; ?></td>
                <?php if ($data1['status_jual'] == 'belum'){ ?>
                  <td><a href="penjualanproses.php?act=proses&amp;id=<?php echo $data1['kode_jual'] ;?>&amp;ref=penjualan.php" class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Proses">Proses</a></td>
                <td><a href="penjualanproses.php?act=batal&amp;id=<?php echo $data1['kode_jual'];?>&amp;ref=penjualan.php" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Batal">Batal</a></td>
                <?php }else{ ?>
                  <td><a href="penjualanproses.php?act=selesai&amp;id=<?php echo $data1['kode_jual'];?>&amp;ref=penjualan.php" class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="tooltip" title="Selesai">Selesai</a></td>
                <td><a href="penjualanproses.php?act=batal&amp;id=<?php echo $data1['kode_jual'];?>&amp;ref=penjualan.php" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Batal">Batal</a></td>
                <?php } ?>
              </tr>
        <?php }?>
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