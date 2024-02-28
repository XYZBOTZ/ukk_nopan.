<?= $this->extend('layout/menu'); ?>

<?= $this->section('judul'); ?>
<h3>Manajemen data satuan</h3>

<?= $this->endSection()?>

<?= $this->section('isi') ?>

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

<div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <p><a href="<?=site_url('tambah-satuan');?>" class="btn btn-primary ">
          Tambah</a></p>
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">

        <form method="POST" action="/satuan/index">
          <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari Namasatuan" aria-label="Cari Namasatuan" aria-describedby="tombolsatuan">
  <button class="btn btn-primary" type="Submit" id="tombolsatuan">Cari</button>
</div>
        </form>

        
          <table class="table table-sm table-striped ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if(isset($listSatuan)){
                  $no = null;
                  foreach ($listSatuan as $baris) {
                    $no++
                    ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $baris['satnama'];?></td>
                    <td>
                    <a href="<?= site_url('hapus-satuan/') . $baris['satid'];?>"class="btn btn-danger">hapus</a>
                    <a href="<?= site_url('edit-satuan/') . $baris['satid']; ?>" class="btn btn-danger">edit</a>
                    </td>
          

                    <?php
                  }
                }
                ?>
                    
                </tr>
                
            </tbody>
          </table>
          
        </div>
      </div>
      

<?= $this->endSection();?>