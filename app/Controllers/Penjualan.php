<?php

namespace App\Controllers;
use App\Models\Modelpenjualan;

class Penjualan extends BaseController
{
    public function index()
    {
        $data = [
            'list-penjualan' => $this->penjualan->findAll()
        ];
        return view('penjualan/data_penjualan', $data);
    }
}