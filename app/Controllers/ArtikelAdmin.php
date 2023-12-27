<?php

namespace App\Controllers;

use App\Models\ArtikelAdminModel;

class ArtikelAdmin extends BaseController
{
    protected $artikelAdminModel;

    public function __construct()
    {
        $this->artikelAdminModel = new ArtikelAdminModel();
    }

    public function index()
    {
        $data['artikel'] = $this->artikelAdminModel->getSemuaArtikel();
        return view('backend_pages/admin/artikel', $data);
    }
}
