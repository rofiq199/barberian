<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Daftar Barbershop</h2>
        <ol>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li>barbershop</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
    <div class="md-form active-cyan-2 mb-3">
      <input class="form-control" type="text" id="search" placeholder="Search" aria-label="Search">
    </div>
      <div class="row">
        <?php foreach ($data_barber as $barber) { ?>
          <div class="card col-12 col-md-5">
            <img src="<?= base_url('img/') . $barber->foto ?>" style="max-height: 12rem;" class="card-img-top" alt="...">
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
<script>
  $(document).ready(function() {
    $('#search').keyup(function() {
      var barber = $(this).val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('home/getbarbershop') ?>",
        dataType: "JSON",
        data: {
          barber: barber
        },
        success: function(data) {
          console.log(data);
          $('.row').empty();
          for (i = 0; i < data.length; i++) {
            $('.row').append('<div class="card col-12 col-md-5">' +
              '<img src="..." class="card-img-top" alt="...">' +
              '<div class="card-body">' +
              '<h5 class="card-title">' + data[i]['nama_bs'] + '</h5>' +
              '<p class="card-text">' + data[i]['alamat_bs'] + '</p>' +
              '<p class="card-text">Jam Beroperasi : ' + data[i]['jam_buka'] + ' - ' + data[i]['jam_tutup'] + ' </p>' +
              '<a href="detail_barber/' + data[i]['username_bs'] + '" class="btn text-center open-submit col-12 col-md-12">Buka Barber</a>' +
              '</div>' +
              ' </div>');
          }
        },
      });
    });
  })
</script>