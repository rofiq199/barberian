<?php
      // Load file koneksi.php 
      $koneksi = mysqli_connect("localhost","root","","barberian");
      
      // Check connection
      if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
      }
  session_start();
  if(!isset($_SESSION['usernamebs']))header("location: K3GOL_E/barberian/index.php");
// Ambil data Username yang dikirim oleh profilcs.php 
$kode = $_POST['kode'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
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
		$query = "SELECT * FROM produk WHERE kode_produk='".$kode."'";
		$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

		// Cek apakah file foto sebelumnya ada di folder images
		if(is_file("img/".$data['foto_produk'])) // Jika foto ada
			unlink("img/".$data['foto_produk']); // Hapus file foto sebelumnya yang ada di folder images
		
		// Proses ubah data ke Database
		$query = "UPDATE produk SET nama_produk='".$nama."', harga_produk='".$harga."',foto_produk='".$fotobaru."',stok='".$stok."' WHERE kode_produk='".$kode."'";
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
        $query = "UPDATE produk SET nama_produk='".$nama."', harga_produk='".$harga."', stok='".$stok."' WHERE kode_produk='".$kode."'";
        $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
        header("location: produk.php");
	}
?>
