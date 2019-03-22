<!-- login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">Login - <?= APP_NAME ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('auth/login') ?>" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                </div>
                <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-success btn-block">Masuk</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <p>
            Belum memiliki akun? daftar <a href="<?= site_url('home/daftar') ?>">disini</a>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- login -->

<!-- flash data -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>