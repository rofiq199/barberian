<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                    <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    .
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header text-right">
                    <button class="btn btn-primary" id="tambahproduk">Tambah Produk</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="mydata">
                                <?php foreach ($produk as $index => $a) { ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><img src="<?= base_url('img') . '/' . $a->foto_produk ?>" alt="" style=" max-width: 100px; max-height:100px;" srcset=""></td>
                                        <td><?= $a->nama_produk ?></td>
                                        <td><?= $a->harga_produk; ?></td>
                                        <td><?= $a->stok; ?></td>
                                        <td>
                                            <a href="javascript:;" id="tomboledit" data-id='<?= $a->kode_produk ?>'><i class="fas fa-edit"></i></a>
                                            <a href=""><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Nama Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Produk</label>
                            <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input type="text" class="form-control" required name="harga" id="harga" placeholder="Harga Produk">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Stok</label>
                            <input type="text" class="form-control" required name="stok" id="stok" placeholder="Stok Produk">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submit">Tambah</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#tambahproduk').click(function() {
                $('form').attr('action', '<?= base_url('admin/produk/add') ?>');
                $('#modal-title').empty();
                $('#modal-title').append('Tambah Produk');
                $('#modal').modal('show');
                $('#kode').val('');
                $('#nama').val('');
                $('#harga').val('');
                $('#stok').val('');
                $('#foto').val('');
            });
            $('#mydata tr').on('click', '#tomboledit', function() {
                $('form').attr('action', '<?= base_url('admin/produk/update') ?>');
                $('#modal').modal('show');
                $('#modal-title').empty();
                $('#modal-title').append('Edit Produk');
                $('#submit').empty();
                $('#submit').append('Edit');
                var id = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('admin/produk') ?>/getproduk",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#kode').val(data[0]['kode_produk']);
                        $('#nama').val(data[0]['nama_produk']);
                        $('#harga').val(data[0]['harga_produk']);
                        $('#stok').val(data[0]['stok']);
                    }
                });
            })
        });
    </script>