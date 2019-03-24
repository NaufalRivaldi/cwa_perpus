<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_part/head.php') ?>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php $this->load->view('_part/sidebar.php') ?>

        <div id="content">
            <!-- navbar -->
            <?php $this->load->view('_part/navbar.php') ?>
            
            <!-- with excel -->
            <div class="container">
                <div class="row">
                    <p>
                        *Download contoh format excel <a href="<?= base_url('./excel/example.xlsx') ?>" style="color:blue;">disini</a>
                    </p>
                </div>
                <div class="row">
                    <form action="<?= site_url('karyawan/import') ?>" method="POST" enctype = "multipart/form-data">
                        <div class="form-group row">
                            <label for="import" class="col-sm-3 col-form-label">Import Excel</label>
                            <div class="col-sm-6">
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input type="submit" name="btn" value="proses" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- manual -->
            <div class="card">
                <h2 class="card-header"><i class="fas fa-user"></i> Tambah Karyawan <span class="badge badge-secondary">Manual</span></h2>
                <div class="card-body">
                    <form action="<?= site_url('karyawan/add') ?>" method="POST">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                            <div class="col-sm-10">
                                <input type="text" name="departemen" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="submit" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" name="btn" value="Proses" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
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