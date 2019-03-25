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
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-print"></i> Print Bukti
                    </a>
                </div>
            </div>
            <hr>
            <div class="card">
                <h2 class="card-header">Bukti Peminjaman</h2>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td align="right" width="15%">Kode Pinjam :</td>
                            <td><?= $pinjam->kd_pinjam ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="15%">Tanggal :</td>
                            <td><?= $pinjam->tgl ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="15%">Peminjam :</td>
                            <td><?= $pinjam->nama ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="15%">Departemen :</td>
                            <td><?= $pinjam->departemen ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="15%">Buku :</td>
                            <td>
                                <ol>
                                    <?php foreach($buku as $row): ?>
                                        <li><?=$row->judul ?> | Qty : <?=$row->qty ?></li>
                                    <?php endforeach ?>
                                </ol>
                            </td>
                        </tr>
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