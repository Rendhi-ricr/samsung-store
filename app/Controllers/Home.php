<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    protected $produkModel, $session;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'isLoggedIn' => session()->has('id_user'),
            'produk' => $this->produkModel->getAll() // Mengambil semua data produk
        ];
        return view('home', $data);
    }
}
