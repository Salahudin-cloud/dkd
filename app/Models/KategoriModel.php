<?php

namespace App\Models;

use CodeIgniter\Model;


class KategoriModel extends Model
{
    // dedfine table name 
    protected $table = 'kategori';

    protected $allowedFields =
    [
        'kategori_nama',
        'kategori_slug'
    ];

    // get all kategori 
    public function getAllKategoriAdmin()
    {
        return $this->table('kategori');
    }

    public function getAllKategori()
    {
        return $this->db->table('kategori')->get()->getResult();
    }


    // delete kategori 
    public function deleteKategori($id)
    {
        return $this->db->table('kategori')
            ->where('kategori_id', $id)
            ->delete();
    }

    public function countAllKategori()
    {
        return $this->db->table('kategori')
            ->countAllResults();
    }

    // insert kategori baru 
    public function insertKategoriBaru($data)
    {
        return $this->db->table('kategori')->insert($data);
    }

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
