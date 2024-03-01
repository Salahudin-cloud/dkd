<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class ArtikelKategori extends BaseController
{
    protected $artikelModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index($kategori)
    {
        $data = [
            'artikelByKategori' => $this->artikelModel->getArtikelByKategori($kategori),
            'all_kategori' => $this->kategoriModel->getAllKategori(),
            'latest_artikel' => $this->artikelModel->getAllLatestArtikel(),
            'pager' => $this->artikelModel->pager
        ];

        return view('frontend_pages/artikel_kategori', $data);
    }
}
