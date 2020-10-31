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
        <center>
        <img src="<?= base_url('assets/Delicious/assets/img/about.jpg')?>" class="rounded mx-auto d-block gambar" alt="...">
        <!-- <a href="#" class="btn text-center open-submit mt-3">Upload Foto</a> -->
        <input type="file" class=" text-center  mt-3" placeholder="Upload Foto">
        </center>
         <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <form action="" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-lg-12 form-group">
              <input type="text" name="username_cs" class="form-control" id="username" placeholder="Username" >
              <div class="validate"></div>
            </div>
            <div class="col-lg-12 form-group">
              <input type="text" name="nama_cs" class="form-control" id="name" placeholder="Name" >
              <div class="validate"></div>
            </div>
            <div class="col-lg-6 form-group">
              <input type="email" class="form-control" name="email_cs" id="email" placeholder="Email" data-rule="email" >
              <div class="validate"></div>
            </div>
            <div class="col-lg-6 form-group">
              <input type="text" name="no_cs" class="form-control" id="phone" placeholder="Phone Number" >
              <div class="validate"></div>
            </div>
          </div>
          
          <div class="text-center"><button type="submit">Ubah Password</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->
      </div>
    </section>

  </main><!-- End #main -->