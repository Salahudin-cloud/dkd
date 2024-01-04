<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;


class ArtikelAdminModel extends Model
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

    public function getSemuaArtikel()
    {
        $builder = $this->db->table('artikel');
        $result = $builder->select('*')
            ->select('kategori.kategori_nama')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->orderBy('artikel_tanggal', 'DESC')
            ->get()
            ->getResult();
        return $result;
    }

    public function countAllArtikel()
    {
        return $this->db->table('artikel')
            ->countAllResults();
    }


    public function getAllTwoArtikel()
    {
        $builder = $this->db->table('artikel')
            ->select('*')
            ->select('kategori.kategori_nama')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->limit(2)
            ->get()
            ->getResult();
        return $builder;
    }
}
