<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <span class="navbar-text">
            Halo, <?= $this->session->userdata('username') ?> <a href="<?= site_url('home/logout') ?>"><button class="btn btn-danger">Keluar</button></a>
        </span>
    </div>
</nav>