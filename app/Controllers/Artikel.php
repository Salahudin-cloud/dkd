<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{

    protected $artikelModel;
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {

        $data = [
            'all_artikel' => $this->artikelModel->getSemuaArtikel(),
            'latest_artikel' => $this->artikelModel->getLatestArtikel()
        ];

        return view('frontend_pages/artikel', $data);
    }
}
