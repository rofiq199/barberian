<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Profil Barbershop</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-6">
                            <form action="<?= base_url('admin/profil/update') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="font-weight-bold">Username Barbershop</label>
                                    <input type="text" class="form-control" readonly name="username" value="<?= $barbershop[0]->username_bs ?>" id="username" placeholder="Username Barberman">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Barbershop</label>
                                    <input type="text" class="form-control" required name="nama" id="nama" value="<?= $barbershop[0]->nama_bs ?>" placeholder="Nama Barberman">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" required name="email" id="email" value="<?= $barbershop[0]->email_bs ?>" placeholder="Email Barberman">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="font-weight-bold">Jam buka</label>
                                        <input type="time" class="form-control" required name="jam_buka" value="<?= $barbershop[0]->jam_buka ?>" id="jam_buka" placeholder="Email Barberman">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="font-weight-bold">Jam tutup</label>
                                        <input type="time" class="form-control" required name="jam_tutup" value="<?= $barbershop[0]->jam_tutup ?>" id="jam_tutup" placeholder="Email Barberman">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat</label>
                                    <input type="text" class="form-control" required name="alamat" id="alamat" value="<?= $barbershop[0]->alamat_bs ?>" placeholder="Alamat Barberman">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">No Hp</label>
                                    <input type="text" class="form-control" required name="no" id="no" value="<?= $barbershop[0]->no_bs ?>" placeholder="No Hp Barberman">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Password</label>
                                    <input type="password" class="form-control" required name="password" value="<?= $barbershop[0]->password_bs ?>" id="password" placeholder="Password Barberman">
                                </div>
                                <div class="form-group">
                                    <img src="<?= base_url('img/') . $barbershop[0]->foto ?>" style="max-width: 100px;" alt="" srcset="">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary" id="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>