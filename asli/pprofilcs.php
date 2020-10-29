<?php
include "koneksi.php";
  session_start();
  if(!isset($_SESSION['username']))header("location: K3GOL_E/barberian/index.php");
// Ambil data Username yang dikirim oleh profilcs.php 
$username = $_POST['username'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no = $_POST['no'];
$password =  $_POST['password'];
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "img/".$fotobaru;
	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$query = "SELECT * FROM data_customer WHERE username_cs='".$username."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("img/".$data['foto_cs'])) // Jika foto ada
			unlink("img/".$data['foto_cs']); // Hapus file foto sebelumnya yang ada di folder images
		// Proses ubah data ke Database
		$query = "UPDATE data_customer SET nama_cs='".$nama."', email_cs='".$email."', no_cs='".$no."', alamat_cs='".$alamat."', password_cs='".$password."', foto_cs='".$fotobaru."' WHERE username_cs='".$username."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: profilcs.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='profilcs.php'>Kembali Ke Form</a>";
		}
	}else{
	// Jika gambar gagal diupload, Lakukan :
	$query = "UPDATE data_customer SET nama_cs='".$nama."', email_cs='".$email."', no_cs='".$no."', alamat_cs='".$alamat."', password_cs='".$password."' WHERE username_cs='".$username."'";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
		echo "<script>alert('Data berhasil di ubah');
		window.location='profilcs.php'</script>";
	}
?>
