<?php 
include "../koneksi.php";
session_start();
$username = $_SESSION['usernamebs'];
$ref = $_GET['ref'];
$act =$_GET['act'];
    if ($act == 'edit'){
        $kode =$_POST['kode'];
        $nama =$_POST['nama'];
        $harga =$_POST['harga'];
        $query = "UPDATE harga_barber set nama_ck='$nama', harga_ck='$harga' where kode_ck='$kode'" ;
        $sql = mysqli_query($koneksi,$query);
    }else if ($act == 'hapus'){
        $kode = $_POST['kode'];
        $query1 = "DELETE FROM harga_barber WHERE kode_ck='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }else if ($act == 'tambah'){
        $nama =$_POST['nama'];
        $harga =$_POST['harga'];
        $query2 = "INSERT INTO harga_barber VALUES (null,'$username','$nama','$harga') ";
        $sql2 = mysqli_query($koneksi,$query2);
    }
header ("location:" . $ref);


?>