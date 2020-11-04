<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Barberian</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/Delicious/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/Delicious/') ?>assets/vendor/owl.carousel/<?= base_url('assets/Delicious/') ?>assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/Delicious/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Barberian</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="<?= base_url('assets/Delicious/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#why-us">Fitur Kami</a></li>
          <li><a href="#gallery">Katalog</a></li>
          <li><a href="<?= base_url('home/barbershop') ?>">Cari Barbershop</a></li>
          <?php if ($this->session->userdata('username') != '') { ?>
              <li class="text-center"><div class="dropdown"><a class=" btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" href="#" id="dropdown"> <img src="<?= base_url('img/') . $this->session->userdata('foto') ?>" style="border-radius: 50%;max-width:30px;" class="img-circle pr-2" alt="" srcset=""><?= $this->session->userdata('username'); ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown">
                <a class="dropdown-item text-warning" href="#">Profil</a>
                <a class="dropdown-item text-warning" href="#">Keranjang</a>
                <a class="dropdown-item text-warning" href="#">Riwayat Pembelian</a>
                <a class="dropdown-item text-warning" href="#">Riwayat Pemesanan</a>
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
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(<?= base_url('assets/Delicious/') ?>assets/img/slide/alat_potong.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Barber</span>ian</h2>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(<?= base_url('assets/Delicious/') ?>assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">#JANGAN<span>LUPA</span>POTONG<span>RAMBUT</span></h2>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url(<?= base_url('assets/Delicious/') ?>assets/img/slide/slide-3.jpg);">
            <div class="carousel-background"><img src="<?= base_url('assets/Delicious/') ?>assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">POTONG RAMBUT <span>DIMANAPUN</span> dan <span>KAPANPUN</span></h2>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Apa Saja <span>Fitur Kami</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Cari Barber</h4>
              <p>Mudah Dalam Mencari Barber yang Diinginkan</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Katalog</h4>
              <p>Menyediakan Berbagai Macam Inspirasi Gaya Rambut</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4>Pesan Barber</h4>
              <p>Panggil Barber Untuk Datang, Kapanpun dan Dimanapun</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Katalog <span>Gaya Rambut</span></h2>
          <p>Lihat Banyaknya Inspirasi Gaya Rambut Kamu</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/bald.png" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/bald.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/army.png" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/army.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                <img src="<?= base_url('assets/Delicious/') ?>assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Barberian</h3>
      <p>Potong Rambut Dimanapun dan Kapanpun</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/Delicious/') ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/Delicious/') ?>assets/js/main.js"></script>

</body>

</html>