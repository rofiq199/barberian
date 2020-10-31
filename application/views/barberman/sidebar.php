<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link" href="<?= base_url('admin/produk') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Produk
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/barber') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Barberman
                    </a>
                    <a class="nav-link" href="<?= base_url('admin/profil') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Profil
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $this->session->userdata('username'); ?>
            </div>
        </nav>
    </div>