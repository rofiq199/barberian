<?php
      // Load file koneksi.php 
      $koneksi = mysqli_connect("localhost","root","","barberian");
      
      // Check connection
      if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
      }
    session_start();
    if(!isset($_SESSION['usernamebs']))header("location: K3GOL_E/barberian/index.php");

      $kd=$_POST['kode2'];

    mysqli_query($koneksi,"DELETE FROM produk WHERE kode_produk='$kd'");
 
    header("location:produk.php");
  ?>