<?php 
include "../../koneksi.php";
$kode = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM penjualan WHERE kode_jual='$kode'");
echo "<script>alert('data telah dihapus');history.go(-1)</script>"
// header("location:history.go(-1)");
?>