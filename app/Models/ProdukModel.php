<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tabel_produk'; // Nama tabel
    protected $primaryKey = 'id_produk'; // Primary key

    // Kolom-kolom yang diizinkan untuk diisi
    protected $allowedFields = [
        'nama',
        'deskripsi',
        'gambar',
        'harga',
        'stok',
        'id_kategori'
    ];

    function getAll()
    {
        $builder = $this->db->table('tabel_produk');
        $builder->join('tabel_kategori', 'tabel_kategori.id_kategori = tabel_produk.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }
}
