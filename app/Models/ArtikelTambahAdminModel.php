<?php

namespace App\Models;

use CodeIgniter\Model;


class ArtikelTambahAdminModel extends Model
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


    public function getArtikelByJudul($judul)
    {
        return $this->db->table('artikel')
            ->where('artikel_judul', $judul)
            ->get()
            ->getResult();
    }

    public function addArtikelBaru($data)
    {
        return $this->db->table('artikel')
            ->insert($data);
    }
}
