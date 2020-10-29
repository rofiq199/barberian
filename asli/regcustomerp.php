<?php
// Load file koneksi.php 
$koneksi = mysqli_connect("localhost","root","","barberian");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
$cek_user=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM data_customer WHERE username_cs='$_POST[username]'"));
    if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Username Sudah Ada Yang Menggunakan");
              window.location="regcustomer.php";
              </script>';
              exit();
    }
    else {
			// Ambil Data yang Dikirim dari Form
			$username = $_POST['username'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$no = $_POST['no'];
			$alamat = $_POST['alamat'];
			$password = $_POST['password'];
			$foto = $_FILES['foto']['name'];
			$tmp = $_FILES['foto']['tmp_name'];
					
				// Rename nama fotonya dengan menambahkan tanggal dan jam upload
				$fotobaru = date('dmYHis').$foto;

				// Set path folder tempat menyimpan fotonya
				$path = "img/".$fotobaru;
				// Proses upload
				if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Proses simpan ke Database
					$query = "INSERT INTO data_customer VALUES('".$username."', '".$nama."', '".$email."','".$no."','".$alamat."','".$password."', '".$fotobaru."')";
					$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

					if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
						echo "<script>alert('Selamat Anda Berhasil Mendaftar');
								window.location='index.php';	
								</script>";
					}else{
						// Jika Gagal, Lakukan :
						echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
						echo "<br><a href='regcustomer.php'>Kembali Ke Form</a>";
					}
				}else{
					// Jika gambar gagal diupload, Lakukan :
					echo "<script>alert('MASUKKAN FOTO YANG AKAN DIJADIKAN PROFIL');history.go(-1);</script>";
				}
			}
?>
