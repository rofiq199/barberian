<?php
// Load file koneksi.php
$koneksi = mysqli_connect("localhost","root","","barberian");
	
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
  session_start();
  if(!isset($_SESSION['usernamebs']))header("location: K3GOL_E/barberian/index.php");
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$username = $_GET['username'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$email = $_POST['email'];
$jambuka = $_POST['jam_buka'];
$jamtutup = $_POST['jam_tutup'];
$alamat = $_POST['alamat'];
$password =  $_POST['password'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
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
		$query = "SELECT * FROM data_barber WHERE username_bs='".$username."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("img/".$data['foto'])) // Jika foto ada
			unlink("img/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "UPDATE data_barber SET nama_bs='".$nama."', email_bs='".$email."', jam_buka='".$jambuka."', jam_tutup='".$jamtutup."', alamat_bs='".$alamat."', foto='".$fotobaru."' WHERE username_bs='".$username."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: /K3GOL_E/barberian/index.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='pbs.php?username=".$_SESSION['username']."'>Kembali Ke Form</a>";
		}
		}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='pbs.php?username=".$_SESSION['username']."'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "UPDATE data_barber SET nama_bs='".$nama."', email_bs='".$email."', jam_buka='".$jambuka."', jam_tutup='".$jamtutup."', alamat_bs='".$alamat."' WHERE username_bs='".$username."'";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: /K3GOL_E/barberian/index.html"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='pbs.php?username=".$_SESSION['username']."'>Kembali Ke Form</a>";
	}
}
?>
