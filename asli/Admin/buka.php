<?php 
include '../koneksi.php';
session_start();
$username = $_SESSION['usernamebs'];
$act= $_GET['act'];
if($act == 'tutup' ){
    $query ="UPDATE data_barber set status_bs='tutup' where username_bs='$username'";
    $masuk = mysqli_query($koneksi,$query);
}elseif($act =='buka'){
    $query ="UPDATE data_barber set status_bs='buka' where username_bs='$username'";
    $masuk = mysqli_query($koneksi,$query);
}

echo "<script>alert('Berhasil merubah status');history.go(-1)</script>";
?>