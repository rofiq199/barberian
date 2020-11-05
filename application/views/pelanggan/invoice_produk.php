<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<main id="main">
	<section class="inner-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="invoice-title">
						<h2>Invoice</h2>
						<h3 class="pull-right"><?= $penjualan[0]->kode_jual; ?></h3>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-6">
							<address>
								<strong>Keteranagan:</strong><br>
								<?= $penjualan[0]->nama_cs; ?><br>
								<?= $penjualan[0]->tanggal_jual; ?>
							</address>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><strong>Order summary</strong></h3>
								</div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<td><strong>No</strong></td>
													<td class="text-center"><strong>Produk</strong></td>
													<td class="text-center"><strong>Jumlah</strong></td>
													<td class="text-right"><strong>Total</strong></td>
												</tr>
											</thead>
											<tbody>
												<?php
												$total = 0;
												foreach ($detail as $index => $a) { ?>
													<tr>
														<td><?= $index + 1; ?></td>
														<td class="text-center"><?= $a->nama_produk; ?></td>
														<td class="text-center"><?= $a->jumlah; ?></td>
														<td class="text-right"><?= 'Rp. ' . number_format($a->harga_produk, 0, ",", "."); ?></td>
													</tr>
												<?php
													$total += $a->harga_produk;
												} ?>
												<tr>
													<td class=""></td>
													<td class=""></td>
													<td class=" text-right"><strong>Total</strong></td>
													<td class=" text-right"><?= 'Rp. ' . number_format($total, 0, ",", "."); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	</section>

</main><!-- End #main -->