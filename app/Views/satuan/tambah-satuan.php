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
<div class="card card-info ">
             
              <!-- form start -->
              <form action="<?=site_url('simpan-satuan');?>" method="POST">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-7 col-form-label">Nama Satuan</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="inputJenis" name="id_satuan">
                      <input type="text" class="form-control" id="inputJenis" name="satnama" required name="satuan" placeholder="Masukan Nama Satuan">
                      <?php if(session()->has('errors')&& session('errors.satnama'));?>
              <p class="text-danger">
                <?=esc(session('errors.satnama'))?>
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
            <!-- /.card -->

<?= $this->endSection();?>