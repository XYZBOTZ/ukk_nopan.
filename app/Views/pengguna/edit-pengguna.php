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
            <form action="<?= site_url('update-pengguna'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-7 col-form-label">Edit Pengguna</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="inputJenis" name="idUser" value="<?= $listPengguna[0]['idUser']; ?>">
                            <input type="text" class="form-control" id="inputJenis" name="Nama_User" value="<?= $listPengguna[0]['Nama_User']; ?>">
                            <input type="text" class="form-control" id="inputJenis" name="username" value="<?= $listPengguna[0]['username']; ?>">
                            <input type="text" class="form-control" id="inputJenis" name="Level" value="<?= $listPengguna[0]['Level']; ?>">
                            <required name="pengguna" placeholder="Masukan Nama Pengguna">
                        </div>
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