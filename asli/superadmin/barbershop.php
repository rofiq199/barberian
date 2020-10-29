<div class="halaman">
<?php 
  include "../koneksi.php";
  session_start();
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM data_barber ";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  ?>
<h3><i class="fas fa-money-check mr-2"></i> List Barbershop</h3><hr>
          <a href="#modalplus" class="btn btn-primary mb-3" data-toggle="modal"><i class="fas fa-plus-square mr-2"></i>Tambah Barbershop</a>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jam Operasional</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Alamat</th>
                <th colspan="3" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no=1;
            while($data = mysqli_fetch_array($sql)){    
            ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $data['username_bs']; ?></td>
                <td><?php echo $data['nama_bs']; ?></td>
                <td><?php echo $data['email_bs']; ?></td>
                <td><?php echo $data['jam_buka']; ?>-<?php echo $data['jam_tutup']; ?></td>
                <td><?php echo $data['no_bs']; ?></td>
                <td><?php echo $data['alamat_bs']; ?></td>
                <td><i class="fas fa-edit bg-success p-2 text-white rounded" data-toggle="modal" data-target="#modaledit<?php echo $no ?>" title="Edit"></i></td>
                <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="modal" data-target=#modalhapus<?php echo $no ?> title="Delete"></i></td>
              </tr>
            <?php }?>
        <form  action="" method="" enctype="multipart/form-data">
      <div class="modal fade" id="modalplus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Tambah Antrian
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-2 my-3">
              <div class="md-form mb-2">
                <input type="username" id="nomor_antrian" class="form-control validate"  name="antri1" placeholder="Nomor Antrian">
              </div>
              <div class="md-form mb-2">
                <input type="username" id="nama" class="form-control validate" name="nama1" placeholder="Nama Pelanggan">
              </div>
              
            </div>
            <div class="modal-footer d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div>
      </div>
      </form>
</tbody>
</table>
</div>