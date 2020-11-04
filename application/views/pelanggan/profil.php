<main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Profil</h2>
        <ol>
          <li><a href="<?= base_url('home')?>">Home</a></li>
          <li>profil</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs Section -->

  <section class="inner-page">
    <div class="container">
      <center>
        <img src="<?= base_url('img/') . $customer[0]->foto_cs ?>" class="rounded mx-auto d-block gambar" alt="...">
        <!-- <a href="#" class="btn text-center open-submit mt-3">Upload Foto</a> -->

        <form action="<?= base_url('pelanggan/profil/update') ?>" method="post" role="form" id="form_profil" enctype="multipart/form-data">
          <input type="file" class="text-center  mt-3" name="foto" placeholder="Upload Foto">
      </center>
      <!-- ======= Book A Table Section ======= -->
      <section id="book-a-table" class="book-a-table">
        <div class="container">

          <div class="php-email-form">
            <div class="form-row">
              <div class="col-lg-12 form-group">
                <input type="text" name="username" value="<?= $customer[0]->username_cs ?>" class="form-control" id="username" placeholder="Username">
                <div class="validate"></div>
              </div>
              <div class="col-lg-12 form-group">
                <input type="text" name="nama" class="form-control" value="<?= $customer[0]->nama_cs ?>" id="name" placeholder="Name">
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 form-group">
                <input type="email" class="form-control" name="email" id="email" value="<?= $customer[0]->email_cs ?>" placeholder="Email" data-rule="email">
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 form-group">
                <input type="text" name="no" class="form-control" id="phone" value="<?= $customer[0]->no_cs ?>" placeholder="Phone Number">
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                <div class="validate"></div>
              </div>
              <div class="col-lg-6 form-group">
                <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Confirm Password">

              </div>
              <div class="col-12 text-center p-3" id="pass_validate">
              </div>
            </div>
            <div class="text-center"><button type="submit">Ubah Profil</button></div>
            </form>
          </div>
        </div>
      </section><!-- End Book A Table Section -->
    </div>
  </section>

</main><!-- End #main -->
<script>
  $(document).ready(function() {
    $("#form_profil").submit(function() {
      var password = $('#password').val();
      var repassword = $('#repassword').val();
      console.log(repassword)
      if (password !== repassword) {
        $('#pass_validate').empty();
        $('#pass_validate').append('password does not match!!');
        return false;

      }
    });
  })
</script>