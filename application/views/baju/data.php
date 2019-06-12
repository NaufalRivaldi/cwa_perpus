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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#baju1">
                        <i class="fas fa-plus-circle"></i> Tambah Baju
                    </button>
                </div>
            </div>
            <hr>
            <div class="card">
                <h2 class="card-header"><i class="fas fa-tshirt"></i> Data Baju</h2>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Nama Baju</th>
                                <th>Ukuran</th>
                                <th>Jml</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($baju as $row): ?>
                            <tr>
                                <td><?= $row->nama_baju ?></td>
                                <td><?= $row->uk; ?></td>
                                <td><?= $row->jml; ?></td>
                                <td>
                                    <a href="<?= site_url('baju/edit/'.$row->id_baju) ?>"><i class="fas fa-cog text-success"></i></a> | 
                                    <?php if($this->session->userdata('stat') == '1'): ?>
                                        <a href="<?= site_url('baju/delete/'.$row->id_baju) ?>" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></a>
                                    <?php endif ?>
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