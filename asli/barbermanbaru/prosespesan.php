<?php 
include "../koneksi.php";
$ref = $_GET['ref'];
if (isset($_GET['act'])){
    $act = $_GET['act'];
    $kode = $_GET['id'];
    if ($act == 'tambah'){
        $query = "INSERT INTO antrian  ";
        $sql = mysqli_query($koneksi,$query);
    }else if ($act == 'proses'){
        $query1 = "UPDATE pesan SET status_pesan= 'proses' WHERE kode_pesan='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }else if ($act == 'selesai'){
        $query1 = "UPDATE pesan SET status_pesan= 'selesai' WHERE kode_pesan='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }else if($act == 'batal'){
        $$query1 = "UPDATE pesan SET status_pesan= 'proses' WHERE kode_pesan='$kode'";
        $sql1 = mysqli_query($koneksi,$query1);
    }
header ("location:" . $ref);
}

?>