<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $produkModel = new \App\Models\ProdukModel();

        // Ambil semua kategori
        $data['kategori'] = $produkModel->getKategori();

        // Ambil filter kategori dari request
        $id_kategori = $this->request->getVar('kategori');

        // Simpan filter kategori ke data
        $data['selectedKategori'] = $id_kategori;

        // Filter produk berdasarkan kategori
        if ($id_kategori) {
            $data['produk'] = $produkModel->getByKategori($id_kategori);
        } else {
            $data['produk'] = $produkModel->getAll();
        }

        return view('produk', $data);
    }
}
