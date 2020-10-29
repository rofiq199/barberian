<?php 
include "../koneksi.php";
$ref = $_GET['ref'];
if (isset($_GET['act'])){
    $act = $_GET['act'];
    $kode = $_GET['id'];
    if ($act == 'proses'){
        $query1 = "UPDATE penjualan SET status_jual= 'proses' WHERE kode_jual='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }else if ($act == 'selesai'){
        $query1 = "UPDATE penjualan SET status_jual= 'selesai' WHERE kode_jual='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }else if($act == 'batal'){
        $query1 = "UPDATE penjualan SET status_jual= 'batal' WHERE kode_jual='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);  
    }
header ("location:" . $ref);
}

?>