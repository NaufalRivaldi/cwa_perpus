<?php 
    $no = 1;
?>

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
                <div class="row">
                    <h3><?= $buku->judul ?></h3><br><br>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?= base_url('assets/img/cover/'.$buku->gambar) ?>" alt="asd" width="100%">
                    </div>
                    <div class="col-md-10">
                        <table class="table">
                            <tr>
                                <td width="18%" align="right">Kode Buku :</td>
                                <td><?= $buku->kode_buku ?></td>
                            </tr>
                            <tr>
                                <td width="18%" align="right">Pengarang :</td>
                                <td><?= $buku->pengarang ?></td>
                            </tr>
                            <tr>
                                <td width="18%" align="right">Penerbit :</td>
                                <td><?= $buku->penerbit ?></td>
                            </tr>
                            <tr>
                                <td width="18%" align="right">Jumlah :</td>
                                <td><?= $buku->jml ?></td>
                            </tr>
                            <tr>
                                <td width="18%" align="right">Keterangan :</td>
                                <td><?= $buku->keterangan ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- peminjam -->
                <h4>Peminjam</h4>
                <div class="row">
                    <table class="table table-striped">
                        <tr>
                            <th>Kode Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Nama Karyawan</th>
                            <th>Qty</th>
                        </tr>
                        <?php foreach($pinjam as $row): ?>
                        <tr>
                            <td><?= $row->kd_pinjam ?></td>
                            <td><?= $row->tgl ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->qty ?></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
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