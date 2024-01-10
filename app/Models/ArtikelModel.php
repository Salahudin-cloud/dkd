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

    public function getAllLatestArtikel()
    {
        return $this->db->table('artikel')
            ->select('*')
            ->where('artikel_status', 'publish')
            ->select('kategori.kategori_nama')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->orderBy('artikel_tanggal', 'DESC')
            ->limit(5)
            ->get()
            ->getResult();
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
        ->where('artikel_status', 'publish')
        ->select('kategori.kategori_nama')
        ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
        ->orderBy('artikel_tanggal', 'DESC')
        ->limit(2)
            ->get()
            ->getResult();
        return $builder;
    }


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

    public function getArticleCoverById($id)
    {
        $query = $this->db->table('artikel')
        ->select('artikel_cover')
        ->where('artikel_id', $id)
            ->get();

        return $query->getRow();
    }

    public function updateArtikel($id, $data)
    {
        return $this->db->table('artikel')
        ->where('artikel_id', $id)
            ->update($data);
    }
}
