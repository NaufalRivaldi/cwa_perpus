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
                <h2 class="card-header">Daftar Peminjaman</h2>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pinjam</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pinjam as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kd_pinjam; ?></td>
                                <td><?= $row->tgl; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= $row->departemen; ?></td>
                                <td>
                                    <a href="<?= site_url('transaksi/detailpinjam/'.$row->kd_pinjam) ?>"><i class="fas fa-eye"></i></a> | 
                                    <a href="<?= site_url('transaksi/editpinjam') ?>"><i class="fas fa-cog text-success"></i></a> | 
                                    <a href="<?= site_url('transaksi/deletepinjam/'.$row->kd_pinjam) ?>" onclick="return confirm('Yakin ingin menghapus peminjaman?')"><i class="fas fa-trash text-danger"></i></a>
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