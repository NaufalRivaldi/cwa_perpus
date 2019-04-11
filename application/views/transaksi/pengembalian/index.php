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

            <div class="card">
                <h2 class="card-header"><i class="fas fa-undo-alt"></i> Pengembalian Buku</h2>
                <div class="card-body">
                    <form action="<?= site_url('transaksi/pengembalian/') ?>" method="POST">
                    <div class="form-group row">
                        <label for="kode_pinjam" class="col-sm-2 col-form-label">Kode Peminjaman</label>
                        <div class="col-sm-8">
                            <input type="text" name="kd_pinjam" class="form-control" id="kode_pinjam" value="<?= $kd_pinjam ?>">
                            <p class="text-warning">Input Kode Peminjaman Dulu.</p>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" name="btn-cek" value="Cek Kode" class="btn btn-success">
                        </div>
                    </div>
                    </form>
                    <hr>
                    <form action="<?= site_url('transaksi/kembali') ?>" method="POST">
                    <input type="hidden" name="kd_pinjam" class="form-control" id="kode_pinjam" value="<?= $kd_pinjam ?>">

                    <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Peminjam</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="peminjam" value="<?= $nama ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_transaksi" class="form-control col-sm-6" id="date" value="<?= $tgl ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" class="form-control col-sm-6" id="date" value="<?= $date ?>">
                            </div>
                        </div>
                        Buku Kembali:<br>
                        <div class="card card-body">
                            <div id="form-plus">
                                <?php if(!empty($buku)): ?>
                                <?php foreach($buku as $row): ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input name="id_buku[]" class="form-check-input" type="checkbox" value="<?= $row->id_buku ?>" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                <?= $row->no_buku." | ".$row->judul ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Denda (Rp)</label>
                            <div class="col-sm-10">
                                <input type="text" name="denda" class="form-control col-md-6" value="<?= $denda ?>">
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