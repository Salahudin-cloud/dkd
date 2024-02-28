<?php

namespace App\Controllers;

use Config\App;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class DetailArtikel extends BaseController
{

    protected $artikelModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index($slug)
    {
        $data = [
            'artikel_data' =>   $this->artikelModel->getSingleSlug($slug),
            'latest_artikel' => $this->artikelModel->getAllLatestArtikel(),
            'all_kategori' => $this->kategoriModel->getAllKategori()
        ];
        return view('frontend_pages/detail_artikel', $data);
    }
}
