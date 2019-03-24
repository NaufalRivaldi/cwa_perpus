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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#user"><i class="fas fa-plus-circle"></i> Tambah User</a>
                </div>
            </div><br>
            <div class="card">
                <h2 class="card-header"><i class="fas fa-user"></i> Daftar User</h2>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Stat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= $row->username; ?></td>
                                <td><?= ($row->stat==1) ? 'Super User' : 'Admin' ?></td>
                                <td>
                                    <a href="<?= site_url('user/edit') ?>"><i class="fas fa-cog text-success"></i></a> | 
                                    <?php if($row->nama != $this->session->userdata('username')): ?>

                                        <a href="<?= site_url('user/delete/'.$row->id_user) ?>" onclick="return confirm('Yakin ingin menghapus user?')"><i class="fas fa-trash text-danger"></i></a>
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