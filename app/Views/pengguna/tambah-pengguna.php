<?= $this->extend('layout/menu'); ?>
<?= $this->section('judul'); ?>

<?= $this->endSection(); ?>

<?= $this->section('isi'); ?>

<?php    
                 use Kint\Zval\Value;

                if (session()->getFlashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo '</h5></div>';

                }
                ?>

<!-- Horizontal Form -->
<div class="row">
  <div class="col-lg-12">
    <div class="card card-info ">

      <!-- form start -->
      <form action="<?= site_url('simpan-pengguna'); ?>" method="POST">

        <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama User</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="Nama_User">
              <input type="text" class="form-control" id="inputJenis" name="Nama_User" required name="pengguna" placeholder="Masukan Nama User">
              <?php if(session()->has('errors')&& session('errors.Nama_User'));?>
              <p class="text-danger">
                <?=esc(session('errors.Nama_User'))?>
            </div>
            </div>
          </div>

          <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">username</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="username">
            <input type="text" class="form-control" id="inputJenis" name="username" required name="pengguna" placeholder="Masukan  username">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="Password">
            <input type="text" class="form-control" id="inputJenis" name="Password" required name="pengguna" placeholder="Masukan  Password">
          </div>
        </div>


       

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-7 col-form-label">Level</label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" id="inputJenis" name="Level">
            <input type="text" class="form-control" id="inputJenis" name="Level" required name="pengguna" placeholder="Masukan Level">
          </div>
        </div>

        
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-info">Simpan</button>
        </div>
        <!-- /.card-footer -->
      </form>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>