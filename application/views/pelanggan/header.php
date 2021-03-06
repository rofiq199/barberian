<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Delicious Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!-- Favicons -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/Delicious/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/css/style.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/css/mystyle.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/MDB-Free_4.19.1/') ?>css/mdb.min.css">
  <!------ Include the above in your HEAD tag ---------->
  <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light" style="font-family : Satisfy, sans-serrif"><a href="index.html"><span>Delicious</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url('assets/Delicious/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block fixed">
        <ul>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li><a href="<?= base_url('home') ?>">Fitur Kami</a></li>
          <li><a href="<?= base_url('home') ?>">Katalog</a></li>
          <li><a href="<?= base_url('home/barbershop') ?>">Cari Barbershop</a></li>
          <?php if ($this->session->userdata('username') != '') { ?>
            <li class="text-center">
              <div class="dropdown"><a class=" btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" href="#" id="dropdown"> <img src="<?= base_url('img/') . $this->session->userdata('foto') ?>" style="border-radius: 50%;max-width:30px;" class="img-circle pr-2" alt="" srcset=""><?= $this->session->userdata('username'); ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown">
                  <a class="dropdown-item text-warning" href="<?= base_url('pelanggan/profil') ?>">Profil</a>
                  <a class="dropdown-item text-warning" href="<?= base_url('pelanggan/pemesanan/keranjang') ?>">Keranjang</a>
                  <a class="dropdown-item text-warning" href="<?= base_url('pelanggan/histori/histori_produk') ?>">Riwayat Pembelian</a>
                  <a class="dropdown-item text-warning" href="<?= base_url('pelanggan/histori') ?>">Riwayat Pemesanan</a>
                  <a class="dropdown-item text-warning" href="#">Logout</a>
                </div>
              </div>
            </li>


          <?php } else { ?>
            <li class="book-a-table text-center"><a href="<?= base_url('auth') ?>">Login</a></li>
          <?php } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->