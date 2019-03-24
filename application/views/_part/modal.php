<!-- Buku -->
<div class="modal fade" id="buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">Tambah Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('buku/add') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="kode_buku" class="col-sm-2 col-form-label">Kode Buku</label>
            <div class="col-sm-10">
                <input type="text" name="kode_buku" class="form-control col-6">
            </div>
          </div>
          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Cover</label>
            <div class="col-sm-10">
                <input type="file" name="gambar" class="form-control col-6">
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
            <div class="col-sm-10">
                <input type="text" name="pengarang" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
                <input type="text" name="penerbit" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
            <div class="col-sm-10">
                <input type="number" name="jml" class="form-control col-6">
            </div>
          </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-10">
              <input type="submit" name="btn" value="Simpan" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- buku -->

<!-- user -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">Tambah Data User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('user/add') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="pwd" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="pwd" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="stat" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select name="stat" id="stat" class="form-control col-6">
                  <option value="">Pilih Level</option>
                  <option value="1">Super User</option>
                  <option value="2">Admin</option>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">&nbsp;</div>
            <div class="col-sm-10">
              <input type="submit" name="btn" value="Simpan" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- user -->

<!-- flash data -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>