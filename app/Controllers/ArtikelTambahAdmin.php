<?php

namespace App\Controllers;

use App\Models\KategoriAdminModel;

class ArtikelTambahAdmin extends BaseController
{
    protected $kategoriAdminModel;

    public function __construct()
    {
        $this->kategoriAdminModel = new KategoriAdminModel();
    }
    public function index()
    {
        // mendapatkan semua kategori 
        $data['kategori'] = $this->kategoriAdminModel->getAllKategori();
        return view('backend_pages/admin/artikel_tambah', $data);
    }
}
