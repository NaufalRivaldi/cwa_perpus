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
                    <a href="<?= site_url('karyawan/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Karyawan</a>
                </div>
            </div><br>
            <div class="card">
                <h2 class="card-header"><i class="fas fa-user"></i> Daftar Karyawan</h2>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Departemen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($karyawan as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= $row->departemen; ?></td>
                                <td>
                                    <a href="<?= site_url('karyawan/view') ?>"><i class="fas fa-eye"></i></a> | 
                                    <a href="<?= site_url('karyawan/edit') ?>"><i class="fas fa-cog text-success"></i></a> | 
                                    <a href="<?= site_url('karyawan/delete/'.$row->id_karyawan) ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i class="fas fa-trash text-danger"></i></a>
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