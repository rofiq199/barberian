<?php  
    session_start();
    include "../koneksi.php";
      // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
      $query = "SELECT * FROM data_barberman ";
      $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
      ?>
<div class="halaman">
  <p class="username"></p>
          <h3><i class="fas fa-store mr-2"></i> LIHAT BARBERMAN</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
              <th scope="col">NO</th>
                <th scope="col">FOTO</th>
                <th scope="col"> <i class="col-p-4"></i> NAMA BARBERMAN</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">NOMOR TELEPON</th>
                <th scope="col">PASSWORD</th>
                <th colspan="3" scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
               while ($data = mysqli_fetch_array($sql)){ ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><img src= "../barberman/img/<?php echo $data['foto_bm'];?>" width = 50px height = 50px ></td>
                <td><?php echo $data['nama_bm'];?></td>
                <td><?php echo $data['email_bm'];?></td>
                <td><?php echo $data['alamat_bm'];?></td>
                <td><?php echo $data['no_bm'];?></td>
                <td><?php echo $data['password_bm'];?></td>  
                <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded"  onclick="window.location.href='proses/barberman.php?id=<?php echo $data['username_bm']?>'" title="Delete"></i></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
<script src="../js/jquery-3.4.1.min.js"></script>