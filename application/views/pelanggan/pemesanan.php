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

        <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="col-md-6">
            <div class=" form-group">
              <input type="text" name="username_cs" class="form-control" id="username" placeholder="Your Username" >
              <div class="validate"></div>
            </div>
            <div class=" form-group">
              <input type="text" class="form-control" name="username_bm" id="usernamebm" placeholder="Barberman Username" >
              <div class="validate"></div>
            </div>
          <div class="form-group">
            <textarea class="form-control" name="alamat" rows="5" placeholder="Masukkan Alamat Pemesanan"></textarea>
            <div class="validate"></div>
          </div>
        </div>
          <div class="boxes col-md-6">
            <input type="checkbox" name="harga" id="harga">
            <label for="box-1">Sustainable typewriter cronut</label>

            <input type="checkbox" id="box-2" checked>
            <label for="box-2">Gentrify pickled kale chips </label>

            <input type="checkbox" id="box-3">
            <label for="box-3">Gastropub butcher</label>
          </div>


          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          </div>
        </div>
          <div class="text-center"><button type="submit">Pesan</button></div>
        
        </form>

      </div>
    </section><!-- End Book A Table Section -->
    </section>

  </main><!-- End #main -->