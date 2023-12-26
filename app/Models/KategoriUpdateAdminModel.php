<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriUpdateAdminModel extends Model
{

    // dedfine table name 
    protected $table = 'kategori';

    protected $allowedFields =
    [
        'kategori_nama',
        'kategori_slug'
    ];


    // get spesific kategori 
    public function getSpesificKategori($kategori_id)
    {
        return $this->db->table('kategori')
            ->where('kategori_id', $kategori_id)
            ->get()
            ->getRow();
    }

    // update kategori
    public function updateKategori($kategori_id, $data)
    {
        return $this->db->table('kategori')
            ->where('kategori_id', $kategori_id)
            ->update($data);
    }
}
