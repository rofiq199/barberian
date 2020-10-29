<?php
      // Load file koneksi.php 
      $koneksi = mysqli_connect("localhost","root","","barberian");
      
      // Check connection
      if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
      }
  session_start();
  if(!isset($_SESSION['usernamebs']))header("location: K3GOL_E/barberian/index.php");
// Ambil data Username yang dikirim oleh barberman.php 
$username = $_POST['username'];
// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no = $_POST['no'];
$password = $_POST['password'];
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "../barberman/img/".$fotobaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$query = "SELECT * FROM data_barberman WHERE username='".$username."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("img/".$data['foto_bm'])) // Jika foto ada
			unlink("img/".$data['foto_bm']); // Hapus file foto sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "UPDATE data_barberman SET nama_bm='".$nama."', email_bm='".$email."',alamat_bm='".$alamat."',no_bm='".$no."',password_bm='".$password."',foto_bm='".$fotobaru."' WHERE username_bm='".$username."'";
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
        $query =  "UPDATE data_barberman SET nama_bm='".$nama."', email_bm='".$email."',alamat_bm='".$alamat."',no_bm='".$no."',password_bm='".$password."'	 WHERE username_bm='".$username."'";
        $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
        header("location: barberman.php");
	}
?>
