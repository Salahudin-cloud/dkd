<?php

namespace App\Controllers;

use App\Models\ArtikelAdminModel;

class Home extends BaseController
{

    protected $artikelAdminModel;
    public function __construct()
    {
        $this->artikelAdminModel = new ArtikelAdminModel();
    }
    // frontend landing page 
    public function index(): string
    {
        $data = [
            'artikel' => $this->artikelAdminModel->getAllTwoArtikel()
        ];
        return view('frontend_pages/index', $data);
    }
}
