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
                   <div class="col-12">
                       <a href="<?= site_url('baju') ?>" class="btn btn-primary">< Kembali</a><br><br>
                       <h2>List Ambil dan Tukar Baju</h2>
                       <table class="table">
                           <tr>
                               <td width="20%">Nama Baju</td>
                               <td width="5%">:</td>
                               <td><?= $baju->nama_baju ?></td>
                           </tr>
                           <tr>
                               <td>Ukuran</td>
                               <td>:</td>
                               <td><?= $baju->uk ?></td>
                           </tr>
                           <tr>
                               <td>Qty</td>
                               <td>:</td>
                               <td><?= $baju->jml ?></td>
                           </tr>
                       </table>
                   </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <h3 class="card-header"><i class="fas fa-tshirt"></i> Ambil</h3>
                <div class="card-body">
                    <table class="table_id table-striped" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nama Baju/Ukuran</th>
                                <th>Qty</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($historia as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kd_transaksi; ?></td>
                                <td><?= $row->tgl; ?></td>
                                <td><?= $row->nama_baju; ?> - <?= $row->uk; ?></td>
                                <td><?= $row->qty; ?></td>
                                <td><?= $row->keterangan; ?></td>
                                <td>
                                    <button class="btn btn-warning kembali" data-id="<?= $row->id_ta ?>" data-toggle="modal" data-target="#kembali">Kembali</button> | 
                                    <a href="<?= site_url('baju/deleteambil/'.$row->id_ta) ?>" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="card">
                <h3 class="card-header"><i class="fas fa-tshirt"></i> Tukar</h3>
                <div class="card-body">
                    <table class="table_id table-striped" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Nama Baju/Ukuran</th>
                                <th>Qty</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($historit as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->kd_transaksi; ?></td>
                                <td><?= $row->tgl; ?></td>
                                <td><?= $row->nama_baju; ?> - <?= $row->uk; ?></td>
                                <td><?= $row->qty; ?></td>
                                <td><?= $row->keterangan; ?></td>
                                <td>
                                    <a href="<?= site_url('baju/deletetukar/'.$row->id_tt) ?>" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash text-danger"></i></a>
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

    <!-- add form -->
    <script>
        $('document').ready(function(){
            // form-plus
            var i = 1;
            $('#plus').click(function (e) {
                e.preventDefault();
                $('#form-plus-baju').append('<div class="form-group row" id="row'+i+'"><label for="buku" class="col-sm-2 col-form-label">Baju</label><div class="col-sm-4"><select name="id_baju[]" id="baju" class="form-control"><option value="">Pilih Baju</option><?php foreach($baju as $row): ?><option value="<?= $row->id_baju ?>"><?= $row->nama_baju ?> - <?= $row->uk ?></option><?php endforeach ?></select></div><label for="baju" class="col-sm-2 col-form-label">Qty</label><div class="col-sm-3"><input type="number" name="qty[]" class="form-control"></div><div class="col-sm-1"><a href="#" class="btn btn-danger remove" id="'+i+'">-</a></div></div>');

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