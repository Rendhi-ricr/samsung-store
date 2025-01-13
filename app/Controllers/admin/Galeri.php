<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
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
        return view('admin/galeri/index', $data);
    }

    public function tambah()
    {
        return view('admin/galeri/tambah');
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_galeri' => 'required',
            'gambar' => 'uploaded[gambar]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move(ROOTPATH . 'public/img/galeri', $namaGambar);

        $this->galeri->save([
            'nama_galeri' => $this->request->getPost('nama_galeri'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_galeri)
    {
        $data['galeri'] = $this->galeri->find($id_galeri);
        return view('admin/galeri/edit', $data);
    }

    public function update($id_galeri)
    {
        $galeri = $this->galeri->find($id_galeri);

        if (!$this->validate([
            'nama_galeri' => 'required',
            'gambar' => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            if (file_exists(ROOTPATH . 'public/img/galeri' . $galeri['gambar'])) {
                unlink(ROOTPATH . 'public/img/galeri' . $galeri['gambar']);
            }
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/img/galeri', $namaGambar);
        } else {
            $namaGambar = $galeri['gambar'];
        }

        $this->galeri->update($id_galeri, [
            'nama_galeri' => $this->request->getPost('nama_galeri'),
            'gambar' => $namaGambar
        ]);

        return redirect()->to('/admin/galeri')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id_galeri)
    {
        $galeri = $this->galeri->find($id_galeri);
        if (file_exists('uploads/galeri/' . $galeri['gambar'])) {
            unlink('uploads/galeri/' . $galeri['gambar']);
        }
        $this->galeri->delete($id_galeri);

        return redirect()->to('/admin/galeri')->with('success', 'Data berhasil dihapus!');
    }
}
