<?php 
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi,"SELECT * from admin where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
	$_SESSION['admin'] = $username;
	$_SESSION['status'] = "login";
	header("location:menuutama.php");
	echo ('yes');
}else{
	header("location:/K3GOL_E/barberian/index.php");
	echo("no");
}
?>