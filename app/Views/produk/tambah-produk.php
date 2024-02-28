<?= $this->extend('layout/menu'); ?>
<?= $this->section('judul'); ?>

<?= $this->endSection(); ?>

<?= $this->section('isi'); ?>

<!-- Horizontal Form -->
<div class="row">
  <div class="col-lg-12">
    <div class="card card-info ">

      <!-- form start -->
      <h3 class="card-title">Form Tambah Produk</h3>

      <form action="<?= site_url('simpan-produk'); ?>" method="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Kode Produk</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="kode_produk">
              <input type="text" class="form-control" id="inputJenis" name="kode_produk" required name="produk" placeholder="Masukan Kode Produk">
              <?php if(session()->has('errors')&& session('errors.kode_produk'));?>
              <p class="text-danger">
                <?=esc(session('errors.kode_produk'))?>
            </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama Produk</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="nama_produk">
              <input type="text" class="form-control" id="inputJenis" name="nama_produk" required name="produk" placeholder="Masukan Nama Produk">
              <?php if(session()->has('errors')&& session('errors.kode_produk'));?>
              <p class="text-danger">
                <?=esc(session('errors.kode_produk'))?>
            </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Harga Beli</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="harga_beli">
              <input type="text" class="form-control uang" id="inputJenis" name="harga_beli" required name="produk" placeholder="Masukan harga Beli">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Harga Jual</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="harga_jual">
              <input type="text" class="form-control" id="inputJenis" name="harga_jual" required name="produk" placeholder="Masukan harga Jual">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Diskon</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="diskon">
              <input type="text" class="form-control" id="inputJenis" name="diskon" required name="produk" placeholder="">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama kategori</label>
            <div class="col-sm-10">
              <select class="form-control" id="inputJenis" name="katid">
                <option value="">--pilih--</option>
                <?php foreach ($listKategori as $value) : ?>
                  <option value="<?= $value['katid']; ?>"><?= $value['katnama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Nama Satuan</label>
            <div class="col-sm-10">
              <select class="form-control" id="inputJenis" name="satid">
                <option value="">--pilih--</option>
                <?php foreach ($listSatuan as $value) : ?>
                  <option value="<?= $value['satid']; ?>"><?= $value['satnama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-7 col-form-label">Stok</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="inputJenis" name="stok">
              <input type="text" class="form-control" id="inputJenis" name="stok" required name="produk" placeholder="Masukan Stok">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-info">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>