<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$pass = $_POST['password'];


// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from data_customer where username_cs='$username' and password_cs='$pass'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	echo "<script>alert('Selamat Anda Berhasil Login');history.go(-1)</script>";
	// header("location:/K3GOL_E/barberian/index.php");
}else{
	// header("location:/K3GOL_E/barberian/index.php");
	echo "<script>alert('Username/Password Salah!!!');history.go(-1)</script>";
}
?>