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
                <form action="<?= site_url('baju/edit') ?>" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_baju" value="<?= $baju->id_baju ?>">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Baju</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_baju" class="form-control" value="<?= $baju->nama_baju ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Ukuran</label>
                        <div class="col-sm-10">
                            <select name="uk" id="uk" class="form-control col-6">
                                <option value="S" <?= ($baju->uk == 'S') ? 'selected' : '' ?>>S</option>
                                <option value="M" <?= ($baju->uk == 'M') ? 'selected' : '' ?>>M</option>
                                <option value="L" <?= ($baju->uk == 'L') ? 'selected' : '' ?>>L</option>
                                <option value="XL" <?= ($baju->uk == 'XL') ? 'selected' : '' ?>>XL</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Jumlah (Pcs)</label>
                        <div class="col-sm-10">
                            <div class="qty">
                                <input type="number" name="jml" value="<?= $baju->jml ?>" class="form-control col-4">
                            </div>
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