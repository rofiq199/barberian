<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
							<div class="cart" id="cart">
								<?php foreach ($this->cart->contents() as $a) { ?>
									<div class="row">
										<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
										</div>
										<div class="col-xs-4">
											<h4 class="product-name"><strong><?= $a['name']; ?></strong></h4>
										</div>
										<div class="col-xs-6">
											<div class="col-xs-6 text-right">
												<h6><strong><?= $a['price']; ?> <span class="text-muted">x</span></strong></h6>
											</div>
											<div class="col-xs-4">
												<input type="text" class="form-control input-sm" id="qty" data-row="<?= $a['rowid'] ?>" value="<?= $a['qty'] ?>">
											</div>
											<div class="col-xs-2">
												<button type="button" class="btn btn-link btn-xs">
													<span class="glyphicon glyphicon-trash"> </span>
												</button>
											</div>
										</div>
									</div>
									<hr>
								<?php } ?>
							</div>
							<div class="row">
								<div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
								</div>
								<div class="col-xs-4">
									<h4 class="product-name"><strong>Product name</strong></h4>
									<h4><small>Product description</small></h4>
								</div>
								<div class="col-xs-6">
									<div class="col-xs-6 text-right">
										<h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
									</div>
									<div class="col-xs-4">
										<input type="text" class="form-control input-sm" value="1">
									</div>
									<div class="col-xs-2">
										<button type="button" class="btn btn-link btn-xs">
											<span class="glyphicon glyphicon-trash"> </span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<div class="row text-center">
								<div class="col-xs-9">
									<h4 class="text-right">Total <strong>$50.00</strong></h4>
								</div>
								<div class="col-xs-3">
									<button type="button" class="btn btn-success btn-block">
										Checkout
									</button>
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
		$('.row').on('blur', '#qty', function() {
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
					// $('.row').empty();
					for (i = 0; i < data.length; i++) {
						console.log(data[i]['name']);
						// $('#cart').append('<div class="row">' +
						// 	'<div class="col-xs-2">' + '<img class="img-responsive" src="http://placehold.it/100x70">' +
						// 	'</div>' +
						// 	'<div class="col-xs-4">' +
						// 	'<h4 class="product-name"><strong>' + data[i]['name'] + '</strong></h4>' +
						// 	'</div>' +
						// 	'<div class="col-xs-6">' +
						// 	'<div class="col-xs-6 text-right">' +
						// 	'<h6><strong>' + data[i]['price'] + ' <span class="text-muted">x</span></strong></h6>' +
						// 	'</div>' +
						// 	'<div class="col-xs-4">' +
						// 	'<input type="text" class="form-control input-sm" id="qty" data-row="' + data[i]['rowid'] + '" value="' + data[i]['qty	'] + '">' +
						// 	'</div>' +
						// 	'<div class = "col-xs-2" >' +
						// 	'<button type = "button" class = "btn btn-link btn-xs" >' +
						// 	'<span class = "glyphicon glyphicon-trash" > </span> </button>' +
						// 	'</div> </div> </div> <hr>'

						// );
					}
				},
			});
		});
	});
</script>