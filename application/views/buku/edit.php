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

            <div class="container">
                <form action="<?= site_url('buku/edit') ?>" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_buku" value="<?= $buku->id_buku ?>">

                    <div class="form-group row">
                        <label for="kode_buku" class="col-sm-2 col-form-label">Kode Buku</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode_buku" class="form-control col-6" value="<?= $buku->kode_buku ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" value="<?= $buku->judul ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10">
                            <input type="file" name="gambar" class="form-control col-6">
                            <p class="text text-warning">Jika tidak mengganti gambar kosongkan saja.</p>
                            <input type="hidden" name="gambar-old" value="<?= $buku->gambar ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="text" name="pengarang" class="form-control" value="<?= $buku->pengarang ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" name="penerbit" class="form-control" value="<?= $buku->penerbit ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" name="jml" class="form-control col-6" value="<?= $buku->jml ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?= $buku->keterangan ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                        <input type="submit" name="btn" value="Simpan" class="btn btn-primary">
                        </div>
                    </div>
                </form>                
            </div>
        </div>    
    </div>

    <!-- modal -->
    <?php $this->load->view('_part/modal.php') ?>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?php $this->load->view('_part/javascript.php') ?>
</body>

</html>