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
        return $this->table('artikel')
            ->select('artikel.*, kategori.*')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->where('artikel_status', 'publish')
            ->paginate(3);
    }
    public function getSemuaArtikelAdmin()
    {
        return $this->table('artikel')
            ->select('artikel.*, kategori.kategori_nama')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->where('artikel_status', 'publish')
            ->paginate(5);
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


    public function getSingleSlug($slug)
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.*')
            ->join('kategori', 'kategori.kategori_id = artikel.kategori_id')
            ->where('artikel_slug', $slug)
            ->get()->getRow();
    }


    // query artikel by kategori
    public function getArtikelByKategori($kategori_slug)
    {
        return $this->table('artikel')
            ->join('kategori', 'artikel.kategori_id = kategori.kategori_id')
            ->where('artikel.artikel_status', 'publish')
            ->where('kategori.kategori_slug', $kategori_slug)
            ->orderBy('artikel.artikel_tanggal', 'DESC')
            ->paginate(3);
    }

    public function getArtikelBySearch($key)
    {
        $this->builder()
            ->select('*')
            ->join('kategori', 'artikel.kategori_id = kategori.kategori_id')
            ->where('artikel.artikel_status', 'publish')
            ->like('artikel.artikel_judul', $key, 'both')
            ->orderBy('artikel.artikel_tanggal', 'DESC');

        return [
            'artikel' => $this->paginate(3),
            'pager' => $this->pager
        ];
    }
}
