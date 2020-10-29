<?php
    // Load file koneksi.php 
    $koneksi = mysqli_connect("localhost","root","","barberian");
      
    // Check connection
    if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	session_start();
	$username = $_SESSION['usernamebs'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama1'];
$harga = $_POST['harga1'];
$foto = $_FILES['foto1']['name'];
$tmp = $_FILES['foto1']['tmp_name'];
$stok = $_POST['stok1'];
	
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "img/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO produk VALUES(null, '".$_SESSION['usernamebs']."', '".$nama."', '".$harga."', '".$fotobaru."', '".$stok."')";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: produk.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='produk.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
		// Proses simpan ke Database
		$query = "INSERT INTO produk VALUES ( null,username_bs='".$username."', nama_produk='".$nama."',harga_produk= '".$harga."',stok= '".$stok."')";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='produk.php'>Kembali Ke Form</a>";
}
?>
