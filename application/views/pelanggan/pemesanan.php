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
    <!-- ======= Book A Table Section ======= -->
    <div class="section-title">
      <h2>Pesan <span>Barber</span></h2>
    </div>
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <form action="<?= base_url('pelanggan/pemesanan/invoice') ?>" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-5">
              <div class=" form-group">
                <input type="hidden" name="kode_order" value="<?= strtoupper(date('Ymd') . random_string('alnum', 4)); ?>">
                <input type="text" name="username_cs" class="form-control" value="<?= $this->session->userdata('username') ?>" id="username" placeholder="Your Username">
                <div class="validate"></div>
              </div>
              <div class=" form-group">
                <input type="text" class="form-control" name="username_bm" id="usernamebm" value="<?= $this->uri->segment(4) ?>" placeholder="Barberman Username">
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="alamat" rows="5" placeholder="Masukkan Alamat Pemesanan"></textarea>
                <div class="validate"></div>
              </div>
              <div class=" form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" name="total" id="total" placeholder="">
                <div class="validate"></div>
              </div>
            </div>
            <div class="boxes col-md-7">
              <?php foreach ($harga as $a) { ?>
                <input type="checkbox" class="list" name="kode_ck[]" value="<?= $a->kode_ck ?>" data-harga="<?= $a->harga_ck ?>" id="item<?= $a->kode_ck ?>">
                <label for="item<?= $a->kode_ck ?>"><?= $a->nama_ck; ?>/<?= $a->harga_ck; ?></label>
              <?php } ?>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
          </div>
          <div class="text-center mt-5"><button type="submit">Pesan</button></div>

        </form>

      </div>
    </section><!-- End Book A Table Section -->
  </section>
</main><!-- End #main -->
<script>
  $(document).ready(function() {
    $('.list').click(function() {
      var total = 0;
      $("input[type='checkbox']:checked").each(function() {
        total += parseInt($(this).data('harga'));
      })
      console.log(total);
      $('#total').val(total);
    })
  });
</script>