<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class ArtikelCari extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        $key = $this->request->getGet('q');
        $dataCari =  $this->artikelModel->getArtikelBySearch($key);
        $data = [
            'artikel_cari' => $dataCari['artikel'],
            'pager' => $dataCari['pager'],
            'latest_artikel' => $this->artikelModel->getAllLatestArtikel(),
            'all_kategori' => $this->kategoriModel->getAllKategori()
        ];

        return view('frontend_pages/artikel_cari.php', $data);
    }
}
