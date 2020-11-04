<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Inner Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Produk</li>
                    <a class="pl-2" href=""><i class="fas fa-shopping-cart"></i></a>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->
    <section class="inner-page">
        <div class="cart" id="mycart">
        </div>
        <div class="container">
            <center>
                <div class="form-group has-search col-md-10 p-5">
                    <input class="form-control" id="search" type="text" placeholder="Cari produk" aria-label="Search">
                </div>
            </center>
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
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil Add to cart",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
            });
        });
        $('#search').keyup(function() {
            var produk = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('pelanggan/produk/getproduk') ?>",
                dataType: "JSON",
                data: {
                    produk: produk
                },
                success: function(data) {
                    console.log(data);
                    $('.row').empty();
                    for (i = 0; i < data.length; i++) {
                        $('.row').append('<div class="card col-6 col-md-3 p-2">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title" id="nama_produk">' + data[i]['nama_produk'] + '</h5>' +
                            '<p class="card-text" id="harga_produk">' + data[i]['harga_produk'] + '</p>' +
                            '<p class="card-text">' + data[i]['nama_bs'] + '</p>' +
                            '<a href = "javascript:;"' +
                            ' id = "addcart"' +
                            '  class = "btn text-center open-submit col-12 col-md-12"' +
                            ' data - produk = "' + data[i]['kode_produk'] + '"' +
                            ' data - harga = "' + data[i]['harga_produk'] + '"' +
                            ' data - nama = "' + data[i]['nama_produk'] + '" > Add to cart </a>' +
                            '</div></div>');
                    }
                },
            });
        });
    })
</script>