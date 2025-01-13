<?php

namespace App\Controllers;

use App\Models\GaleriModels;

class Galeri extends BaseController
{
    protected $galeri;

    public function __construct()
    {
        $this->galeri = new GaleriModels();
    }

    public function index()
    {
        $data['galeri'] = $this->galeri->findAll();
        return view('galerifoto', $data);
    }
}
