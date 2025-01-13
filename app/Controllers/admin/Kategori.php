<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        // Ambil semua data kategori dari database
        $data['kategori'] = $this->kategoriModel->findAll();

        // Tampilkan halaman index
        return view('admin/kategori/index', $data);
    }


    // Menampilkan form tambah kategori
    public function tambah()
    {
        return view('admin/kategori/tambah');
    }

    // Menyimpan kategori baru
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'nama_kategori' => 'required|min_length[3]|is_unique[tabel_kategori.nama_kategori]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Simpan ke database
        $this->kategoriModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form edit kategori
    public function edit($id_kategori)
    {
        // Ambil data kategori berdasarkan ID
        $data['kategori'] = $this->kategoriModel->find($id_kategori);

        // Jika data tidak ditemukan, tampilkan error
        if (empty($data['kategori'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('admin/kategori/edit', $data);
    }

    // Memperbarui data kategori
    public function update($id_kategori)
    {
        // Ambil data kategori lama
        $kategoriLama = $this->kategoriModel->find($id_kategori);

        if ($kategoriLama['nama_kategori'] === $this->request->getPost('nama_kategori')) {
            $rule_nama = 'required|min_length[3]';
        } else {
            $rule_nama = 'required|min_length[3]|is_unique[tabel_kategori.nama_kategori]';
        }

        // Validasi input
        if (!$this->validate([
            'nama_kategori' => $rule_nama,
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Update data ke database
        $this->kategoriModel->update($id_kategori, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ]);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Menghapus data kategori
    public function delete($id_kategori)
    {
        // Hapus data dari database
        $this->kategoriModel->delete($id_kategori);

        return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
