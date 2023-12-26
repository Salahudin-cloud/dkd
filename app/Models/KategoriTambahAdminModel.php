<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriTambahAdminModel extends Model
{

    // dedfine table name 
    protected $table = 'kategori';

    protected $allowedFields =
    [
        'kategori_nama',
        'kategori_slug'
    ];


    // insert kategori baru 
    public function insertKategoriBaru($data)
    {
        return $this->db->table('kategori')->insert($data);
    }
}
