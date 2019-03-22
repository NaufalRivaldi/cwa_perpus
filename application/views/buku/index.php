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

            <div class="card">
                <h2 class="card-header"><i class="fas fa-book"></i> Daftar Buku</h2>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Jml</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($buku as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->judul; ?></td>
                                <td><img src="<?= base_url('assets/img/'.$row->gambar) ?>" alt="default-book" width="100px"></td>
                                <td><?= $row->pengarang; ?></td>
                                <td><?= $row->penerbit; ?></td>
                                <td><?= $row->jml; ?></td>
                                <td><?= $row->keterangan; ?></td>
                                <td>
                                    <a href="<?= site_url('buku/edit') ?>"><i class="fas fa-cog text-success"></i></a> | 
                                    <a href="<?= site_url('buku/delete') ?>"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
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