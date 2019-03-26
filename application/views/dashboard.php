<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_part/head.php') ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php $this->load->view('_part/sidebar.php') ?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- navbar -->
            <?php $this->load->view('_part/navbar.php') ?>
            
            <h1>Selamat datang di Sistem Informasi Perpustakaan</h1>
            <h2>PT. CITRA WARNA JAYA ABADI</h2>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-book"></i></i> Jumlah Buku</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $jml_buku ?> Buku</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header"><i class="fas fa-user"></i> Jumlah Karyawan</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $jml_karyawan ?> Orang</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header"><i class="fas fa-undo"></i> Jumlah Peminjaman</div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $jml_pinjam ?> Peminjaman</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <?php $this->load->view('_part/modal.php') ?>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?php $this->load->view('_part/javascript.php') ?>
</body>

</html>