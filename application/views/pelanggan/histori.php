<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Riwayat Pemesanan</h2>
        <ol>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li>histori</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <?php foreach ($pesan as $a) { ?>
        <div class="card">
          <h5 class="card-header" style="font-family : Poppins"><?= $a->kode_pesan; ?></h5>
          <div class="card-body">
            <h5 class="card-title" style="font-family : Poppins">Tanggal : <?= $a->tanggal_pesan; ?></h5>
            <p class="card-text">Alamat : <?= $a->alamat_pesan; ?></p>
            <a href="#" class="btn histori">Go somewhere</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

</main><!-- End #main -->