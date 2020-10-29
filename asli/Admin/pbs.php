<html>
<head>
	<title></title>
	<link rel="stylesheet" href="pbs.css">
</head>
<body>
	<h1>Ubah Data barber</h1>
	
	<?php
	// Load file koneksi.php 
	$koneksi = mysqli_connect("localhost","root","","barberian");
	
	// Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	session_start();
	// Ambil data NIS yang dikirim oleh index.php melalui URL
	$username = $_SESSION['username'];
	
	// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
	$query = "SELECT * FROM data_barber  WHERE username_bs='".$username."'";
	$sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
	$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
	?>
	
	<form method="post" action="pubahbs.php?username=<?php echo $username; ?>" enctype="multipart/form-data">
	<table cellpadding="8">
	<b>
		<center><img  valign='bottom' src="img/<?php echo $data['foto']; ?>"></center>
	</b>
	<tr>
		<td>Username</td>
		<td><?php echo $data['username_bs']; ?></td>
	</tr>
	<tr>
		<td>Nama Barbershop</td>
		<td><input type="text" name="nama" value="<?php echo $data['nama_bs']; ?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $data['email_bs']; ?>"></td>
	</tr>
	<tr>
		<td>Jam Buka</td>
		<td><input type="time" name="jam_buka" value="<?php echo $data['jam_buka']; ?>"></td>
	</tr>
	<tr>
		<td>Jam Tutup</td>
		<td><input type="time" name="jam_tutup" value="<?php echo $data['jam_tutup']; ?>"></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat"><?php echo $data['alamat_bs']; ?></textarea></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="text" name="password" value="<?php echo $data['password_bs']; ?>"></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>
			<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
			<input type="file" name="foto">
		</td>
	</tr>
	</table>
	
	<input type="submit" value="Ubah">
	<a href="../logout.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
