<!doctype html>
<html lang="en">
  <head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="keranjang.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6b0af4bcb3.js" crossorigin="anonymous"></script>
    <?php 
    include "navbar.php";
    include "koneksi.php";
    $total = 0;
  ?>
  </head>
  <body>
<div class="kartu mt-3">
  <div class="container">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-8">
      <?php 
          if (isset($_SESSION['items'])) {
       foreach ($_SESSION['items'] as $key => $val){
        $query = mysqli_query ($koneksi,"select * from produk join data_barber on produk.username_bs = data_barber.username_bs where kode_produk = '$key'");
        $rs = mysqli_fetch_array($query);
        $jumlah_harga = $rs['harga_produk'] * $val;
        $total += $jumlah_harga;
      ?>
      <div class="card mt-2">
        <div class="card-header" name="judul">
          <h6><?php echo $rs['nama_bs'] ?></h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-xl-3">
              <img class="img-thumbnail" src="admin/img/<?php echo $rs['foto_produk'];?>" alt="">
            </div>
                <div class="col-lg-7 col-xl-8">
                  <div class="row">
                    <p><?php echo $rs['nama_produk']; ?></p>
                    <h6 class="ml-auto">Rp. <?php echo number_format($rs['harga_produk']); ?></h6>
                  </div>
                    <div class="row">
                      <a href="pcart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class="ml-auto hapus">Hapus</a>
                    </div>
                  <div class="def-number-input number-input col">
                    <a href="pcart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="fas fa-minus-square"></a>
                    <input class="quantity" min="1" max="<?php echo $rs['stok'];?>" name="quantity" value="<?php echo $val    ?>" type="number">
                    <a href="pcart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="fas fa-plus-square"></a>
                  </div>
                </div>
            </div>
        </div>
      </div>
       <?php }?>
    </div>
    <div class="col-6 col-md-4">
    <div class="card mt-2" style="width: 25rem;">
        <div class="card-body">
        <div class="container">
            <p class="card-title"><strong>Ringkasan Belanja</strong></p>
              <div class="border-bottom"></div>
            <p class="card-text">Total Harga</p>
            <p class="card-text" name="total" value="<?php echo $total ?>" >Rp <?php echo $total ?></p>
              <div class="border-bottom"></div>
            <button   data-toggle="modal" data-target="#modalck" class="btn btn-success text-white"><strong>Beli</strong></button>
            </div>
        </div>
        <?php } ?>
</div>
    </div>
  </div>
</div>
</div>
<!-- form modal -->
      <form action="chekout.php" method="POST">
        <div class="modal" id="modalck"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin membeli produk ini?</p>
              <input type="hidden" value="<?php echo $total;?>" name="total2">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" >Beli</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      </form>
      <!-- akhir form -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>