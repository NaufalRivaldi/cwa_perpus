<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_part/head.php') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body>
    <div class="container">
        <div class="login">
            <div class="kotak">
                <center>
                    <img src="<?= base_url('assets/img/icon.png') ?>" alt="logo" width="100px">
                </center><br>
                <h3>Login Warehouse GA</h3>
                <hr>
                <form action="<?= site_url('user/login') ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pwd" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </div>
                </form>
                <center>
                    <p style="font-size:0.8em;">
                        Copyright &copy; 2019 Naufal Rivaldi. All Rights Reserved.
                    </p>
                </center>
            </div>
        </div>
    </div>

    <!-- modal -->
    <?php $this->load->view('_part/modal.php') ?>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?php $this->load->view('_part/javascript.php') ?>
</body>

</html>