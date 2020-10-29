<?php
      // Load file koneksi.php 
      $koneksi = mysqli_connect("localhost","root","","barberian");
      
      // Check connection
      if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
      }
    session_start();
    if(!isset($_SESSION['usernamebs']))header("location: K3GOL_E/barberian/index.php");

      $username=$_POST['username'];

    mysqli_query($koneksi,"DELETE FROM data_barberman WHERE username_bm='$username'");
 
    header("location:barberman.php");
  ?>