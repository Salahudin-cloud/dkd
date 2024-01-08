<?php


namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
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
        return $this->db->table('artikel')
            ->select('*')
            ->where('artikel_status', 'publish')
            ->select('kategori.kategori_nama')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->get()
            ->getResult();
    }

    public function getLatestArtikel()
    {
        return $this->db->table('artikel')
            ->orderBy('artikel_tanggal', 'asc')
            ->get()
            ->getResult();
    }
}
