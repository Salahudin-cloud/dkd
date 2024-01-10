<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class ArtikelAdmin extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        $data['artikel'] = $this->artikelModel->getSemuaArtikel();
        return view('backend_pages/admin/artikel', $data);
    }
}
