<!doctype html>
<html lang="en">
<head>
<tittle>Keranjang Belanja</tittle>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
  <tr>
    <th align="left" scope="col">Kode Barang</th>
    <th align="left" scope="col">Nama Barang</th>
    <th align="right" scope="col">Harga</th>
    <th align="right" scope="col">Qty</th>
    <th align="right" scope="col">Jumlah Harga</th>
    <th align="right" scope="col">Aksi</th>
  </tr>
  <?php
   session_start();
  include "koneksi.php";
  $total = 0;
  if (isset($_SESSION['items'])) {
    print_r($_SESSION['items']);
        foreach ($_SESSION['items'] as $key => $val){
            $query = mysqli_query ($koneksi,"select * from produk where kode_produk = '$key'");
            $rs = mysqli_fetch_array($query);
             
            $jumlah_harga = $rs['harga_produk'] * $val;
            $total += $jumlah_harga;
  ?>
  <tr>
    <td><?php echo $rs['kode_produk']; ?></td>
    <td><?php echo $rs['nama_produk']; ?></td>
    <td align="right"><?php echo number_format($rs['harga_produk']); ?></td>
    <td align="right"><?php echo number_format($val); ?></td>
    <td align="right"><?php echo number_format($jumlah_harga); ?></td>
    <td align="right"><a href="pcart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=pcarte.php">+</a> | <a href="pcart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=pcarte.php">-</a> | <a href="pcart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=pcarte.php">Hapus</a></td>
  </tr>
  <?php
        }
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="right" name="total"><?php echo number_format($total); ?></td>
    <td align="right"><a href="pcart.php?act=clear&amp;ref=pcarte.php">Clear</a></td>
  </tr>
</table>
<center><a type="submit" href="chekout.php">chekout</a><center>
<p><?php  echo(" waktu :".date('Ymd H:i:s'));
    $timezone = time() + (60 * 60 * 7); 
    echo(" waktu asli:".gmdate('Ymd H:i:s',$timezone)); ?></p>
<?php
     echo $_SESSION['username'];
?>
<div class="jam-digital-malasngoding">
		<p id="jam"></p>
		<p id="menit"></p>
		<p id="detik"></p>
</div>
<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
</script>
</body>
</html>