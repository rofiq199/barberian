<?php 
include "../../koneksi.php";
$kode = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM data_barberman WHERE username_bm='$kode'");
echo "<script>alert('data telah dihapus');history.go(-1)</script>"
// header("location:history.go(-1)");
?>