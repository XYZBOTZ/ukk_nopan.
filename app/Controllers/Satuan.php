<?php

namespace App\Controllers;

use App\Models\Modelsatuan;

class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'listSatuan' => $this->satuan->findAll()
        ];
        return view('satuan/data_satuan', $data);
    }

    public function tambahSatuan()
    {
        return view('satuan/tambah-satuan');
    }

    public function simpanSatuan()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('satnama','Nama Satuan','required|is_unique[satuan.satnama]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'satnama'=>$this->request->getPost('satnama'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data = [
            'satnama' => $this->request->getPost('satnama')
        ];
        $this->satuan->insert($data);
        session()->setFlashdata('pesan', 'data berhasil di tambahkan!!');
        return redirect()->to('/list-satuan');
    }

    public function editSatuan($satid)
    {
        $syarat = [
            'satid' => $satid
        ];
        $data = [
            'introText' => '<p>Berikut adalah data pengguna,silahkan tambahkan data baru pada halaman ini</p>',
            'judulHalaman' => 'Data Satuan',
            'listSatuan' => $this->satuan->where($syarat)->findAll()
        ];
        return view('satuan/edit-satuan', $data);
    }

    public function updateSatuan()
    {
        $data = [
            'satid' => $this->request->getVar('satid'),
            'satnama' => $this->request->getVar('satnama'),
        ];
        $this->satuan->update($this->request->getVar('satid'), $data);
        session()->setFlashdata('pesan', 'data berhasil di edit!!');
        return redirect()->to('/list-satuan');
    }

    public function hapusSatuan($id)
    {
        $this->satuan->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus!!');
        return redirect()->to('/list-satuan');
    }
}
