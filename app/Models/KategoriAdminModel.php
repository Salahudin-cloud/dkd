<?php


namespace App\Models;

use CodeIgniter\Model;

class KategoriAdminModel extends Model
{
    // dedfine table name 
    protected $table = 'kategori';

    protected $allowedFields =
    [
        'kategori_nama',
        'kategori_slug'
    ];


    // get all kategori 
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
}
