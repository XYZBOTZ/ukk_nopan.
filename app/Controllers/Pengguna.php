<?php

namespace App\Controllers;

use App\Models\Modelpengguna;

class Pengguna extends BaseController
{
    public function index()
    {
        $data = [
            'listPengguna' => $this->pengguna->findAll()
        ];
        return view('pengguna/data_pengguna', $data);
    }

    public function tambahPengguna()
    {
        return view('pengguna/tambah-pengguna');
    }

    public function simpanPengguna()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('Nama_User','Penguna','required|is_unique[user.Nama_User]',[
            'is_unique' => '{field} Telah di gunakan',
        ]);

        $datavalid =[
            'Nama_User'=>$this->request->getPost('Nama_User'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data = [
            'Nama_User' => $this->request->getVar('Nama_User'),
            'username' => $this->request->getVar('username'),
            'Password' => md5($this->request->getVar('Password')),
            'Level' => $this->request->getVar('Level'),
            
        ];
        $this->pengguna->save($data);
        session()->setFlashdata('pesan', 'data berhasil di tambahkan!!');
        return redirect()->to('/list-pengguna');
    }

    public function editPengguna($idUser){
        $syarat=[
            'idUser'=>$idUser
        ];
        $data=[
            'introText'=>'<p>Berikut adalah data pengguna,silahkan tambahkan data baru pada halaman ini</p>',
            'judulHalaman'=> 'Data Pengguna',
            'listPengguna'=> $this->pengguna->where($syarat)->findAll()
        ];
        return view('pengguna/edit-pengguna',$data);
    }
    
        public function updatePengguna(){
            $data=[
                    'idUser'=>$this->request->getVar('idUser'),
                    'Nama_User'=>$this->request->getVar('Nama_User'),
                    'username'=>$this->request->getVar('username'),
                    'Level'=>$this->request->getVar('Level'),
                   
            ];
            $this->pengguna->update($this->request->getVar('idUser'), $data);
            session()->setFlashdata('pesan', 'data berhasil di edit!!');
            return redirect()->to('/list-pengguna');
        }

    public function hapusPengguna($id)
    {
        $this->pengguna->delete($id);
        session()->setFlashdata('pesan', 'data berhasil di hapus!!');

        return redirect()->to('/list-pengguna');
    }
}