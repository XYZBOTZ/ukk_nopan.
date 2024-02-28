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
            <form action="<?= site_url('update-satuan'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-7 col-form-label">Edit Satuan</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="inputJenis" name="satid" value="<?=$listSatuan[0]['satid'];?>">
                            <input type="text" class="form-control" id="inputJenis" name="satnama" value="<?=$listSatuan[0]['satnama'];?>">
                            <required name="satuan" placeholder="Masukan Nama Satuan">
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