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

            <div class="container">
                <div class="row">
                    <a href="<?= site_url('transaksi/viewpinjam') ?>" class="btn btn-primary"><i class="fas fa-list"></i> List Peminjam</a>
                </div>
            </div>
            <br>
            <div class="card">
                <h2 class="card-header"><i class="fas fa-book"></i> Peminjaman Buku</h2>
                <div class="card-body">
                    <form action="<?= site_url('transaksi/pinjam') ?>" method="POST">
                        <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Kode Pinjam</label>
                            <div class="col-sm-10">
                                <input type="text" name="kd_pinjam" class="form-control" value="<?= $kd_pinjam ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peminjam" class="col-sm-2 col-form-label">Peminjam</label>
                            <div class="col-sm-10">
                                <select name="id_karyawan" id="peminjam" class="form-control">
                                    <option value="">Pilih Karyawan</option>
                                    <?php foreach($karyawan as $row): ?>
                                        <option value="<?= $row->id_karyawan ?>"><?= $row->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl" class="form-control col-sm-6" id="date" value="<?= $date ?>">
                            </div>
                        </div>
                        Buku :<br>
                        <div class="card card-body">
                            <div id="form-plus">
                                <div class="form-group row">
                                    <label for="buku" class="col-sm-1 col-form-label">judul</label>
                                    <div class="col-sm-3">
                                        <select name="id_buku[]" id="buku" class="form-control">
                                            <option value="">Pilih Buku</option>
                                            <?php foreach($buku as $row): ?>
                                                <option value="<?= $row->id_buku ?>"><?= $row->judul ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <label for="buku" class="col-sm-1 col-form-label">Qty</label>
                                    <div class="col-sm-2">
                                        <input type="number" name="jml[]" class="form-control">
                                    </div>
                                    <label for="buku" class="col-sm-1 col-form-label">Kode</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="no_buku[]" class="form-control">
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="#" class="btn btn-success" id="plus">+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" name="btn" value="Proses" class="btn btn-primary btn-block">
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

    <script>
        $('document').ready(function(){
            // form-plus
            var i = 1;
            $('#plus').click(function (e) {
                e.preventDefault();
                $('#form-plus').append('<div class="form-group row" id="row'+i+'"><label for="buku" class="col-sm-1 col-form-label">judul</label><div class="col-sm-3"><select name="id_buku[]" id="buku" class="form-control"><option value="">Pilih Buku</option><?php foreach($buku as $row): ?><option value="<?= $row->id_buku ?>"><?= $row->judul ?></option><?php endforeach ?></select></div><label for="buku" class="col-sm-1 col-form-label">Qty</label><div class="col-sm-2"><input type="number" name="jml[]" class="form-control"></div><label for="buku" class="col-sm-1 col-form-label">Kode</label><div class="col-sm-3"><input type="text" name="no_buku[]" class="form-control"></div><div class="col-sm-1"><a href="#" class="btn btn-danger remove" id="'+i+'">-</a></div></div>');

                i++;
            });

            $(document).on('click', '.remove', function(e){
                e.preventDefault();
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
        });
    </script>
</body>

</html>