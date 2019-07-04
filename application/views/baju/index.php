<?php 
    $nama = "asd";
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ambil">
                        Ambil
                    </button> &nbsp;
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tukar">
                        Tukar
                    </button>
                </div>
            </div>
            <hr>
            <h2><i class="fas fa-tshirt"></i> Seragam Citra Warna</h2><br>
            <?php foreach($group as $data): ?>
            <div class="card">
                <h4 class="card-header"><?= $data->nama_baju ?></h4>
                <div class="card-body">
                    <table class="table_id table-striped" class="display">
                        <thead>
                            <tr>
                                <th>Warna</th>
                                <th>Uk</th>
                                <th>Stock</th>
                                <th>Terambil</th>
                                <th>Tukar</th>
                                <th>Sisa Baru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $baju = $this->db->where('nama_baju', $data->nama_baju)->get('tb_baju')->result();
                            ?>
                            <?php foreach($baju as $row): ?>
                            <?php 
                                $ambil = $this->helper->ambil($row->id_baju);
                                $tukar = $this->helper->tukar($row->id_baju);
                                $total = $row->jml + $ambil + $tukar;
                            ?>
                            <tr>
                                <td><?= $row->nama_baju; ?></td>
                                <td><?= $row->uk; ?></td>
                                <td><?= $total; ?></td>
                                <td><?= $ambil; ?></td>
                                <td><?= $tukar; ?></td>
                                <td><?= $row->jml; ?></td>
                                <td>
                                    <a href="<?= site_url('baju/viewbaju/'.$row->id_baju) ?>"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <?php endforeach ?>
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