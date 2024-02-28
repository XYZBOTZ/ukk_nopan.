<?php

namespace App\Controllers;

use App\Models\Modelkategori;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'listKategori' => $this->kategori->findAll()
        ];
        return view('kategori/data_kategori', $data);
    }

    public function tambahKategori()
    {
        return view('kategori/tambah-kategori');
    }

    public function simpanKategori()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('katnama','Nama Kategori','required|is_unique[kategori.katnama]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'katnama'=>$this->request->getPost('katnama'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data = [
            'katnama' => $this->request->getVar('katnama')
        ];
        $this->kategori->save($data);
        session()->setFlashdata('pesan', 'data berhasil di tambahkan!!');

        return redirect()->to('/list-kategori');
    }

    public function editKategori($katid)
    {
        $syarat = [
            'katid' => $katid
        ];
        $data = [
            'introText' => '<p>Berikut adalah data pengguna,silahkan tambahkan data baru pada halaman ini</p>',
            'judulHalaman' => 'Data Kategori',
            'listKategori' => $this->kategori->where($syarat)->findAll()
        ];

        return view('kategori/edit-kategori', $data);
    }

    public function updateKategori()
    {
        $data = [
            'katid' => $this->request->getVar('katid'),
            'katnama' => $this->request->getVar('katnama'),
        ];
        $this->kategori->update($this->request->getVar('katid'), $data);
        session()->setFlashdata('pesan', 'data berhasil di edit!!');
        return redirect()->to('/list-kategori');
    }



    public function hapusKategori($id)
    {
        $this->kategori->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus!!');

        return redirect()->to('/list-kategori');
    }
}
