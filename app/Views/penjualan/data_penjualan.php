<?= $this->extend('layout/menu'); ?>
<?= $this->section('judul'); ?>


<h3>Manajemen data penjualan</h3>

<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      <p><a href="<?= site_url('tambah-penjualan'); ?>" class="btn btn-primary ">
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

    <form method="POST" action="/penjualan/index">

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Nama penjualan" aria-label="Cari Nama penjualan" aria-describedby="tombolpenjualan">
        <button class="btn btn-primary" type="Submit" id="tombolpenjualan">Cari</button>
      </div>
    </form>
    <table class="table table-sm table-striped ">
      <thead>
        <tr>
          <th>No</th>
          <th>no_faktur</th>
          <th></th>
          <th></th>
          
        </tr>
      </thead>

      <tbody>
        <?php
        if (isset($listPenjualan)) {
          $no = null;
          foreach ($listPenjualan as $baris) {
            $no++
        ?>

            <tr>
              <td><?= $no; ?></td>
              <td><?= $baris['kode_produk']; ?></td>
              <td><?= $baris['nama_produk']; ?></td>
              <td><?= $baris['harga_beli']; ?></td>
              <td><?= $baris['harga_jual']; ?></td>
              <td><?= $baris['diskon']; ?></td>
              <td><?= $baris['katid']; ?></td>
              <td><?= $baris['satid']; ?></td>
              <td><?= $baris['stok']; ?></td>
              <td>
                <a href="<?= site_url('hapus-produk/') . $baris['idProduk']; ?>" class="btn btn-danger">hapus</a>
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


<?= $this->endSection(); ?>