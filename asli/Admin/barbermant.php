<?php
    // Load file koneksi.php 
    $koneksi = mysqli_connect("localhost","root","","barberian");
      
    // Check connection
    if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	session_start();
	$usernamebs = $_SESSION['usernamebs'];

// Ambil Data yang Dikirim dari Form
$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no = $_POST['no'];
$password = $_POST['password'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../barberman/img/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO data_barberman VALUES('".$username."', '".$_SESSION['usernamebs']."', '".$nama."', '".$email."', '".$alamat."', '".$no."', '".$password."', '".$fotobaru."','kosong')";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: barberman.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='barberman.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
		// Proses simpan ke Database
		$query =  "INSERT INTO data_barberman VALUES('".$username."', '".$_SESSION['usernamebs']."', '".$nama."', '".$email."', '".$alamat."', '".$no."', '".$password."')";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
}
?>
