<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
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

        $data = [
            'all_artikel' => $this->artikelModel->getSemuaArtikel(),
            'pager' => $this->artikelModel->pager,
            'latest_artikel' => $this->artikelModel->getAllLatestArtikel(),
            'all_kategori' => $this->kategoriModel->getAllKategori()
        ];
        return view('frontend_pages/artikel', $data);
    }
}
