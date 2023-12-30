<?php


namespace App\Models;

use CodeIgniter\Model;


class ArtikelUpdateAdminModel extends Model
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

    public function getArtikelByJudul($judul)
    {
        return $this->db->table('artikel')
            ->where('artikel_judul', $judul)
            ->get()
            ->getResult();
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
