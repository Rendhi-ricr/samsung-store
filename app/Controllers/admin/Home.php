<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\GaleriModels;

class Home extends BaseController
{
    public function index()
    {
        $kategori = count(model(KategoriModel::class)->findAll());
        $produk = count(model(ProdukModel::class)->findAll());
        $galeri = count(model(GaleriModels::class)->findAll());

        $data = [
            'kategori' => $kategori,
            'produk' => $produk,
            'galeri' => $galeri,

        ];

        return view('admin/index', $data);
    }
}
