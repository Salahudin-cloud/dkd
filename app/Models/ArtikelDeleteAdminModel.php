<?php

namespace App\Models;

use CodeIgniter\Model;


class ArtikelDeleteAdminModel extends Model
{
    protected $table = 'artikel';

    protected $allowedFields =
    [
        'kategori_id',
        'artikel_tanggal',
        'artikel_judul ',
        'artikel_slug',
        'artikel_konten',
        'artikel_cover',
        'artikel_status'
    ];


    public function getArtikelById($id)
    {
        return $this->db->table('artikel')
            ->where('artikel_id', $id)
            ->get()
            ->getRow();
    }

    public function deleteArtikelById($id)
    {
        return $this->db->table('artikel')
            ->where('artikel_id', $id)
            ->delete();
    }
}
