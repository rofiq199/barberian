<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Inner Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Produk</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
        <div class="cart" id="mycart">
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($produk as $a) { ?>
                    <div class="card col-6 col-md-3 p-2">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title" id="nama_produk"><?= $a->nama_produk; ?></h5>
                            <p class="card-text" id="harga_produk"><?= $a->harga_produk; ?></p>
                            <p class="card-text"><?= $a->nama_bs; ?></p>
                            <a href="javascript:;" id="addcart" class="btn text-center open-submit col-12 col-md-12" data-produk="<?= $a->kode_produk ?>" data-harga="<?= $a->harga_produk; ?>" data-nama="<?= $a->nama_produk; ?>">Add to cart</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<script>
    $(document).ready(function() {
        $(".card-body #addcart").click(function() {
            var produk = $(this).data('produk');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');

            $.ajax({
                type: "POST",
                url: "<?= base_url('pelanggan/produk/addcart') ?>",
                dataType: "JSON",
                data: {
                    produk: produk,
                    nama: nama,
                    harga: harga,
                },
                success: function(data) {
                    console.log(data);
                    $("#mycart").html(data);
                },
            });
        });
    })
</script>