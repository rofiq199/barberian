<?php session_start(); 
  $username = $_SESSION['usernamebs'];
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM antrian  WHERE ( status_antrian='belum' or status_antrian='proses') and username_bs='".$username."' ";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  $jumlah =mysqli_num_rows($sql);

  $bs ="SELECT * FROM data_barber where username_bs='$username'";
  $barbershop = mysqli_query($koneksi,$bs);
  $tampil = mysqli_fetch_array($barbershop);
?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light ">
<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i> 
        </button>
        <a class="navbar-brand text-white" >BARBERIAN</a>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            
            </form>
            <div class="icon ml-4">
                <h5>
                <?php if($tampil['status_bs'] == 'buka'){ ?>
                <button type="button" onclick="window.location.href='buka.php?act=tutup'" class="btn btn-danger btn-sm">TUTUP</button>
                <?php }else{?>
                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='buka.php?act=buka'">BUKA</button>
                <?php }?>
                <a href="../logout.php" class="fas fa-sign-out-alt mr-3 text-white" data-toggle="tooltip" title="Sign Out"></a> 
                </h5>
            
              
  
            </div>
        </nav>
        
      <div class="row no-gutters">
      <div class="col-md-2,5 bg-dark  pt-4 ">
              <ul class="nav flex-column">
                  <ul class="nav flex-column">
                      <ul class="sidebar navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link active text-white" href="penjualan.php"><i class="fas fa-cart-arrow-down mr-2"></i>LIHAT PENJUALAN</a><hr class="bg-secondary">
                        </li>
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
                          <a class="nav-link text-white" href="antrian.php"><i class="fas fa-money-check mr-2"></i>LIHAT ANTRIAN <span class = "badge badge-danger"><?php echo $jumlah; ?></span></a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="listharga.php"><i class="fas fa-dollar-sign mr-3 ml-2"></i>LIST HARGA</a><hr class="bg-secondary">
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-white" href="historiantrian.php"><i class="fas fa-dollar-sign mr-3 ml-2"></i>HISTORI ANTRIAN</a><hr class="bg-secondary">
                        </li>
                    </ul>
        </div>