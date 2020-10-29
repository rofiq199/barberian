
<!DOCTYPE html>
<html>
<head>
	<title>antrian</title>
</head>
<body>
<?php 
include "koneksi.php";
 session_start();
    $id = $_GET['id'];
    $timezone = time() + (60 * 60 * 6); 
  $today = date("Ymd",$timezone); //untuk mengambil tahun, tanggal dan bulan Hari INI
  $username = $_SESSION['username'];
  $tanggal = date("Y-m-d H:i:s",$timezone);
   //cari id terakhir ditanggal hari ini
    $query1 = "SELECT max(kode_antrian) as maxID FROM antrian WHERE kode_antrian LIKE '$today%'";
    $hasil = mysqli_query($koneksi,$query1);
    $data = mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];

   //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
    $NoUrut = (int) substr($idMax, 8, 4);
    $NoUrut++; //nomor urut +1
   
   //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = $today .sprintf('%04s', $NoUrut);
    echo "$NewID";
    //nomor antrian
    $query2 = "SELECT max(no_antrian) as maxno FROM antrian where username_bs='$id' and kode_antrian LIKE '$today%'";
    $hasil1 = mysqli_query($koneksi,$query2);
    $data1 = mysqli_fetch_array($hasil1);
    $noantrian = $data1['maxno'];
    $antrian = (int) substr($noantrian, 0,3);
    $antrian++;
    $baru = sprintf('%03s', $antrian);
    echo($baru);
    print_r ($data1);
// $today nanti jadinya misal 20160526 .sprintf('%04s', $NoUrut) urutan id di tanggal hari ini
  //  proses simpan data id dengan id yg baru ke database
   $query3 = "INSERT INTO antrian VALUES ('$NewID' ,'$id','$username','$tanggal','$baru','belum')";
   $sql3 = mysqli_query($koneksi, $query3); // Eksekusi/ Jalankan query dari variabel $query
    //pesan sukses apa enggak
    if($sql3 == TRUE ) { echo"Data sudah masuk";}
    else {echo "Data gagal";}
    
header("location: lihat_antrian.php");
?>

 selamat Anda berhasil Cekout <a href="halproduk.php">
</body>
</html>