<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{


    public function login()
    {
        return view('login/page-login');
    }

    public function prosesLogin()
    {
        $validasiForm = [
            'username' => 'required',
            'Password' => 'required'
        ];

        if ($this->validate($validasiForm)) {

            $pengguna = $this->pengguna->getPengguna(
                $this->request->getPost('username'),
                $this->request->getPost('Password')
            );

            if (count($pengguna) == 1) {

                $dataSession = [
                    'idUser' => $pengguna[0]['idUser'],
                    'Nama_User' => $pengguna[0]['Nama_User'],
                    'username' => $pengguna[0]['username'],
                    'Password' => $pengguna[0]['Password'],
                    'Level' => $pengguna[0]['Level'],
                    'sudahkahLogin' => true
                ];

                session()->set($dataSession);
                return redirect()->to('/dashboard');
            } else {
                // pesan kesalahan jika login gagal
                return redirect()->to('/')
                    ->with('pesan', '<div class="alert alert-danger" role= </div>')
                    ->withInput();
            }
        } else {
            return redirect()->to('/')
                ->with('pesan', '<div class="alert alert-danger" role="alert")
                </div>');
        }
    }

    
   
}
