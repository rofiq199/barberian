<div class="halaman">
<?php 
  include "../koneksi.php";
  session_start();
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM penjualan ";
  $sql = mysqli_query($koneksi, $query);  // Eksekusi/Jalankan query dari variabel $query
  ?>
<h3><i class="fas fa-money-check mr-2"></i> List Penjualan</h3><hr>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Kode Jual</th>
                <th scope="col">Customer</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Alamat</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th colspan="3" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            while($data = mysqli_fetch_array($sql)){    
            ?>
              <tr>
                <th scope="row"><?php echo $data['kode_jual']; ?></th>
                <td><?php echo $data['username_cs']; ?></td>
                <td><?php echo date("h:i , d F Y ",strtotime($data['tanggal_jual'])); ?></td>
                <td><?php echo $data['alamat_jual']; ?></td>
                <td><?php echo $data['total_harga']; ?></td>
                <td><?php echo $data['status_jual']; ?></td>
                <td><i class="fas fa-trash-alt bg-danger p-2 text-white rounded" onclick="window.location.href='proses/penjualan.php?id=<?php echo $data['kode_jual']?>'" title="Delete"></i></td>
              </tr>
              <form action="barbermanh.php" method="POST">
                <div class="modal fade" id="modalhapus<?php echo $data['kode_jual']; ?>"tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Hapus</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah anda ingin menghapus barberman ini?</p>
                      <input type="hidden" value="<?php echo $data['username_bm'];?>" name="username">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger" >Hapus </button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
      <?php }?>
</tbody>
</table>
</div>