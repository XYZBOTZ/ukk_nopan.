<?php

namespace App\Models;

use CodeIgniter\Model;

class Mproduk extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'idProduk';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idProduk', 'kode_produk', 'nama_produk', 'harga_beli', 'harga_jual', 'diskon', 'katid', 'satid', 'stok'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllProduk()
    {
        $db = \config\Database::connect();
        $produk = $db->table('produk');
        $produk->select('produk.idProduk,produk.kode_produk, produk.nama_produk,produk.harga_beli,produk.harga_jual,produk.diskon,satuan.satnama,kategori.katnama,produk.stok');
        $produk->join('satuan', 'satuan.satid = produk.satid');
        $produk->join('kategori', 'kategori.katid = produk.katid');
        return $produk->get()->getResultArray();

        // $db = \config\Database::connect();
        // $produk = $db->table('produk');
        // $produk->select('produk.kode_produk, produk.nama_produk,produk.harga_beli,produk.harga_jual,produk.diskon,produk.stok');
        // return $produk->get()->getResultArray();
    }
}
