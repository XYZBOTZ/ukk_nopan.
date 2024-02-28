<?php

namespace App\Controllers;

use App\Models\Modelproduk;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'listProduk' => $this->produk->getAllproduk(),
        ];
        return view('produk/data_produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'listKategori' => $this->kategori->findAll(),
            'listSatuan' => $this->satuan->findAll(),
        ];
        return view('produk/tambah-produk', $data);
    }

    public function simpanProduk()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('kode_produk','Kode produk','required|is_unique[produk.kode_produk]',[
            'is_unique' => '{field} Telah di gunakan',
        ]);

        $datavalid =[
            'kode_produk'=>$this->request->getPost('kode_produk'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'diskon' => $this->request->getPost('diskon'),
            'katid' => $this->request->getPost('katid'),
            'satid' => $this->request->getPost('satid'),
            'stok' => $this->request->getPost('stok'),
        ];
        $this->produk->insert($data);
        return redirect()->to('/list-produk');
    }
    
    public function editProduk($idProduk){
        $syarat=[
            'idProduk'=>$idProduk
        ];
        $data=[
            'introText'=>'<p>Berikut adalah data pengguna,silahkan tambahkan data baru pada halaman ini</p>',
            'judulHalaman'=> 'Data Produk',
            'listProduk'=> $this->produk->where($syarat)->findAll()
        ];
        return view('produk/edit-produk',$data);
    }
    
        public function updateProduk(){
            $this->produk->save([
                'kode_produk' => $this->request->getVar('kode_produk'),
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga_beli' => $this->request->getVar('harga_beli'),
                'harga_jual' => $this->request->getVar('harga_jual'),
                'diskon' => $this->request->getVar('diskon'),
                'katid' => $this->request->getVar('katid'),
                'satid' => $this->request->getVar('satid'),
                'stok' => $this->request->getVar('stok'),
            ]);
            // $this->produk->update($this->request->getVar('idProduk'), $data);
            session()->setFlashdata('pesan', 'data berhasil di edit!!');
            return redirect()->to('/list-produk');
        }



    public function hapusProduk($id)
    {
        $this->produk->delete($id);

        return redirect()->to('/list-produk');
    }
}