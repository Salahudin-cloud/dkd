<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriAdmin extends BaseController
{
    protected $kategoriModel;
    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        $data = [
            'kategori' => $this->kategoriModel->getAllKategoriAdmin()->paginate(10),
            'pager' => $this->kategoriModel->pager
        ];
        return view('backend_pages/admin/kategori', $data);
    }


    // delete kategori 
    public function delKategori($id)
    {
        $this->kategoriModel->deleteKategori($id);

        // redirec ke daftar kategori 
        return redirect()->to('kategori');
    }
}
