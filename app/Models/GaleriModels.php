<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModels extends Model
{
    protected $table = 'tabel_galeri'; // Nama tabel
    protected $primaryKey = 'id_galeri'; // Primary key
    protected $allowedFields = ['nama_galeri', 'gambar']; // Field yang dapat diisi
}
