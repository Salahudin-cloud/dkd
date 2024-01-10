<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriAdminModel;

class Home extends BaseController
{

    protected $artikelModel;
    protected $kategoriAdminModel;
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }
    // frontend landing page 
    public function index(): string
    {
        $data = [
            'artikel' => $this->artikelModel->getAllTwoArtikel(),
        ];
        return view('frontend_pages/index', $data);
    }
}
