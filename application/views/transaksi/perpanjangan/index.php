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
                <h2 class="card-header"><i class="fas fa-undo-alt"></i> Perpanjangan Peminjaman</h2>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="kode_pinjam" class="col-sm-2 col-form-label">Kode Peminjaman</label>
                        <div class="col-sm-8">
                            <input type="number" name="kode_pinjam" class="form-control" id="kode_pinjam">
                            <p class="text-warning">Input Kode Peminjaman Dulu.</p>
                        </div>
                        <div class="col-sm-2">
                            <button id="cekPinjam" class="btn btn-success">Cek Kode</button>
                        </div>
                    </div>
                    <hr>
                    <form action="">
                    <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Peminjam</label>
                            <div class="col-sm-10">
                                <select name="id_karyawan" id="peminjam" class="form-control">
                                    <option value="">Pilih Karyawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_transaksi" class="form-control col-sm-6" id="date" value="<?= $date ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="buku" class="col-sm-2 col-form-label">Buku</label>
                            <div class="col-sm-10">
                                <select name="id_karyawan" id="buku" class="form-control">
                                    <option value="">Pilih Buku</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="text" name="jumlah" class="form-control col-md-6">
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