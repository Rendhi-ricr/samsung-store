<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'tabel_kategori'; // Nama tabel
    protected $primaryKey = 'id_kategori'; // Primary key
    protected $allowedFields = ['nama_kategori']; // Field yang dapat diisi
}
