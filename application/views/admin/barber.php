<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">List Produk</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Barberman</li>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target='#modal' id="tambahbarber">Tambah Barberman</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No hp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No hp</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="mydata">
                                <?php foreach ($barber as $index => $a) { ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><img src="<?= base_url('img/') . $a->foto_bm ?>" style="max-width: 100px;" alt="" srcset=""></td>
                                        <td><?= $a->nama_bm ?></td>
                                        <td><?= $a->email_bm; ?></td>
                                        <td><?= $a->alamat_bm; ?></td>
                                        <td><?= $a->no_bm; ?></td>
                                        <td>
                                            <a href="javascript:;" id="tomboledit" data-id='<?= $a->username_bm ?>'><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('admin/barber/hapus') . $a->username_bm ?>"><i class="fas fa-times"></i></a>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="font-weight-bold">Username Barberman</label>
                            <input type="text" class="form-control" required name="username" id="username" placeholder="Username Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Barberman</label>
                            <input type="text" class="form-control" required name="nama" id="nama" placeholder="Nama Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" required name="email" id="email" placeholder="Email Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control" required name="alamat" id="alamat" placeholder="Alamat Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">No Hp</label>
                            <input type="text" class="form-control" required name="no" id="no" placeholder="No Hp Barberman">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Foto</label>
                            <input type="file" class="form-control" required name="foto" id="foto">
                        </div>

                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tambahbarber').click(function() {
                $('form').attr('action', '<?= base_url('admin/barber/add') ?>');
                $('#modal-title').empty();
                $('#modal-title').append('Tambah Barber');
                $('#username').val('');
                $('#nama').val('');
                $('#email').val('');
                $('#alamat').val('');
                $('#no').val('');
            });
            $('#mydata tr').on('click', '#tomboledit', function() {
                $('form').attr('action', '<?= base_url('admin/barber/update') ?>');
                $('#modal').modal('show');
                $('#modal-title').empty();
                $('#modal-title').append('Edit Barber');
                $('#submit').empty();
                $('#submit').append('Edit');
                var id = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('admin/barber') ?>/getbarberman",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#username').val(data[0]['username_bm']);
                        $('#nama').val(data[0]['nama_bm']);
                        $('#email').val(data[0]['email_bm']);
                        $('#alamat').val(data[0]['alamat_bm']);
                        $('#no').val(data[0]['no_bm']);
                    }
                });
            })
        });
    </script>