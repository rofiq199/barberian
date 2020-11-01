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
        <?php foreach ($data_barber as $barber) { ?>
          <div class="card col-12 col-md-5">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $barber->nama_bs; ?></h5>
              <p class="card-text"><?= $barber->alamat_bs; ?></p>
              <p class="card-text">Jam Beroperasi : <?= $barber->jam_buka; ?> - <?= $barber->jam_tutup; ?></p>
              <a href="<?= base_url('home/detail_barber/' . $barber->username_bs) ?>" class="btn text-center open-submit col-12 col-md-12">Buka Barber</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

</main><!-- End #main -->