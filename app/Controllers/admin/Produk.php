<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Produk extends BaseController
{
    protected $produkModel, $kategori;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategori = new KategoriModel();
    }

    // Function untuk menampilkan daftar produk
    public function index()
    {
        // Mengambil semua data produk dari database
        $data = [
            'produk' => $this->produkModel->getAll() // Mengambil semua data produk
        ];

        // Menampilkan view dengan data produk
        return view('admin/produk/index', $data);
    }

    // Function untuk menampilkan form tambah produk
    public function tambah()
    {
        $data = [
            'Kategori' => $this->kategori->findAll(),
        ];
        return view('admin/produk/tambah', $data);
    }

    // Function untuk menyimpan produk baru
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Upload gambar
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move(ROOTPATH . 'public/img/produk', $namaGambar);

        $id_kategori = $this->request->getVar('id_kategori');
        // Simpan ke database
        $this->produkModel->save([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'harga' => $this->request->getPost('harga'),
            'id_kategori' => $id_kategori,
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Function untuk menampilkan form edit produk
    public function edit($id_produk)
    {
        // Ambil data produk berdasarkan ID
        $produk = $this->produkModel->find($id_produk);
        $kategori = $this->kategori->findAll();

        $data = [
            'produk' => $produk,
            'Kategori' => $kategori,
        ];

        // Menampilkan view dengan data produk
        return view('admin/produk/edit', $data);
    }

    // Function untuk mengupdate data produk
    public function update($id_produk)
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/png,image/jpg,image/jpeg]',
            'harga' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Ambil produk lama
        $produkLama = $this->produkModel->find($id_produk);

        if (!$produkLama) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        // Cek apakah ada gambar baru yang diupload
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/img/produk', $namaGambar);

            // Hapus gambar lama jika ada
            if (file_exists(ROOTPATH . 'public/img/produk/' . $produkLama['gambar'])) {
                unlink(ROOTPATH . 'public/img/produk/' . $produkLama['gambar']);
            }
        } else {
            $namaGambar = $produkLama['gambar'];
        }

        // Update data produk di database
        $this->produkModel->update($id_produk, [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'harga' => $this->request->getPost('harga'),
            'id_kategori' => $this->request->getVar('id_kategori'),
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diperbarui!');
    }

    // Function untuk menghapus produk
    public function delete($id_produk)
    {
        // Ambil data produk berdasarkan ID
        $produk = $this->produkModel->find($id_produk);

        // Jika produk tidak ditemukan, tampilkan error
        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        // Hapus gambar dari folder jika ada
        if (file_exists(ROOTPATH . 'public/img/produk/' . $produk['gambar'])) {
            unlink(ROOTPATH . 'public/img/produk/' . $produk['gambar']);
        }

        // Hapus data produk dari database
        $this->produkModel->delete($id_produk);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus!');
    }
}
