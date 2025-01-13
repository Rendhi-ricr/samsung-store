<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
// use App\Models\KendaraanModels;
// use App\Models\TransaksiModels;
// use App\Models\UserModels;

class Home extends BaseController
{
    public function index()
    {
        // $kendaraan = count(model(KendaraanModels::class)->findAll());
        // $transaksi = count(model(transaksiModels::class)->findAll());
        // $user = count(model(UserModels::class)->findAll());

        // $data = [
        //     'mobil' => $kendaraan,
        //     'transaksi' => $transaksi,
        //     'user' => $user,
        // ];

        return view('admin/index');
    }
}
