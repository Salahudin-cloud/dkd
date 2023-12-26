<?php

namespace App\Controllers;

use App\Models\KategoriAdminModel;

class KategoriAdmin extends BaseController
{
    protected $kategoriAdminModel;
    public function __construct()
    {
        $this->kategoriAdminModel = new KategoriAdminModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        $data['kategori'] = $this->kategoriAdminModel->getAllKategori();
        return view('backend_pages/admin/kategori', $data);
    }


    // delete kategori 
    public function delKategori($id)
    {
        $this->kategoriAdminModel->deleteKategori($id);

        // redirec ke daftar kategori 
        return redirect()->to('kategori');
    }
}
