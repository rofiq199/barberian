<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->

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
				<div class="col-12">
					<div class="panel panel-info">
						<div class="panel-body">
							<div id="cart">

							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row text-center">
							<div class="col-xs-9">
								<h4 class="text-right">Total <strong id="total"></strong></h4>
							</div>
							<div class="col-xs-3">
								<a href="<?= base_url('pelanggan/pemesanan/proses_beli') ?>" type="button" class="btn btn-success btn-block">
									Checkout
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</main><!-- End #main -->
<script>
	$(document).ready(function() {
		$('#cart').load("<?php echo base_url(); ?>pelanggan/pemesanan/load_cart");
		$('.row').on('blur', "#qty", function() {
			var row = $(this).data('row');
			var qty = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?= base_url('pelanggan/pemesanan/update_cart') ?>",
				dataType: "JSON",
				data: {
					row: row,
					qty: qty
				},
				success: function(data) {
					console.log(data);
					$('#cart').html(data);
				},
			});
		});
		$('.row').on('click', '#hapus', function() {
			var row = $(this).data("row"); //mengambil row_id dari artibut id
			$.ajax({
				url: "<?= base_url(); ?>/pelanggan/pemesanan/hapus_cart",
				method: "POST",
				data: {
					row: row
				},
				success: function(data) {
					$('#cart').html(data);
				}
			});
		})
	});
	var total = 0;
	$('#qty').each(function() {
		var subtotal = $(this).data('subtotal');
		console.log(subtotal);
	});
	$('#total').append();
</script>