<?= $this->extend('layout/menu'); ?>
<?= $this->section('judul'); ?>

<?= $this->endSection(); ?>

<?= $this->section('isi'); ?>

<!-- Horizontal Form -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-info ">

            <!-- form start -->
            <form action="<?= site_url('update-produk'); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-7 col-form-label">Edit Produk</label>
                        <div class="col-sm-10">
                            
                            <input type="hidden" class="form-control" id="inputJenis" name="idProduk" value="<?=$listProduk[0]['idProduk'];?>">
                            <div class="form-group">
                            <label for="kode_produk">kode produk</label>
                            <input type="text" class="form-control" id="inputJenis" name="kode_produk" value="<?=$listProduk[0]['kode_produk'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">nama produk</label>
                            <input type="text" class="form-control" id="inputJenis" name="nama_produk" value="<?=$listProduk[0]['nama_produk'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Harga beli</label>
                            <input type="text" class="form-control" id="inputJenis" name="harga_beli" value="<?=$listProduk[0]['harga_beli'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Harga jual</label>
                            <input type="text" class="form-control" id="inputJenis" name="harga_jual" value="<?=$listProduk[0]['harga_jual'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Diskon</label>
                            <input type="text" class="form-control" id="inputJenis" name="diskon" value="<?=$listProduk[0]['diskon'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Kategori id</label>
                            <input type="text" class="form-control" id="inputJenis" name="katid" value="<?=$listProduk[0]['katid'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Satuan id</label>
                            <input type="text" class="form-control" id="inputJenis" name="satid" value="<?=$listProduk[0]['satid'];?>">
                            </div>
                            <div class="form-group">
                            <label for="kode_produk">Stok</label>
                            <input type="text" class="form-control" id="inputJenis" name="stok" value="<?=$listProduk[0]['stok'];?>">
                            </div>
                            <required name="produk" placeholder="Masukan Nama Produk">
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