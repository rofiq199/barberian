<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Inner Page</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Inner Page</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <div class="row">
        <div class="card bg-dark text-white col-12 col-md-7">
          <img src="..." class="card-img" alt="...">
          <div class="card-img-overlay">
            <h5 class="card-title"><?= $barber[0]->nama_bs; ?></h5>
            <p class="card-text">Alamat : <?= $barber[0]->alamat_bs; ?></p>
            <p class="card-text">Jam operasional <?= date('H:i', strtotime($barber[0]->jam_buka)); ?> s/d <?= date('H:i', strtotime($barber[0]->jam_tutup)); ?></p>
          </div>
        </div>
        <div class="card border-dark " style="width : 18rem">
          <div class="card-header text-center"></div>
          <div class="card-body text-dark">
            <h5 class="card-title">Pemesanan</h5>
            <p class="card-text">Klik Tombol Berikut untuk Memesan</p>
            <a href="#barberman" class="btn btn-success col-12">Pesan</a>
          </div>
        </div>
      </div>
      <h2 class="text-center mt-2" style="font-family : Open Sans" id="barberman">Lihat Para Barberman Kami</h2>

      <div class="row">
        <?php foreach ($barberman as $a) { ?>
          <div class="card col-12 col-md-3">
            <img src="<?= base_url('img/') . $a->foto_bm ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $a->nama_bm; ?></h5>
              <p class="card-text">
                <?= $a->no_bm; ?>
              </p>
              <a href="<?= base_url('pelanggan/pemesanan/index/' . $a->username_bm)  ?>" class="btn btn-success col-12">Pesan</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    </div>
  </section>

</main><!-- End #main -->