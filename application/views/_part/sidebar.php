<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?= base_url('assets/img/icon.png') ?>" alt="" width="30"><span class="title"><?= APP_NAME ?></span>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="<?= site_url('home/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li>
            <a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user"></i> Menu Admin</a>
            <ul class="collapse list-unstyled" id="admin">
                <?php if($this->session->userdata('stat') == 1): ?>
                <li>
                    <a href="<?= site_url('user') ?>">> User</a>
                </li>
                <?php endif ?>
                <li>
                    <a href="<?= site_url('karyawan') ?>">> Karyawan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-money-check"></i> Transaksi</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="<?= site_url('transaksi/peminjaman') ?>">> Peminjaman</a>
                </li>
                <li>
                    <a href="<?= site_url('transaksi/pengembalian') ?>">> Pengembalian</a>
                </li>
                <li>
                    <a href="<?= site_url('transaksi/perpanjangan') ?>">> Perpanjangan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= site_url('buku') ?>"><i class="fas fa-book"></i> Daftar Buku</a>
        </li>
    </ul>
    <p style="font-size:0.8em; padding:10px;">
        Copyright &copy; 2019 Naufal Rivaldi. All Rights Reserved.
    </p>
</nav>