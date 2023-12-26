<?php

namespace App\Controllers;

use App\Models\KategoriUpdateAdminModel;

class KategoriUpdateAdmin extends BaseController
{
    protected $kategoriUpdateAdminModel;

    public function __construct()
    {
        $this->kategoriUpdateAdminModel = new KategoriUpdateAdminModel();
    }

    public function index($id)
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        $data['kategori'] = $this->kategoriUpdateAdminModel->getSpesificKategori($id);
        return view('backend_pages/admin/kategori_update', $data);
    }

    public function processUpdateKategori($id)
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'kategori' => 'required',
            ],
            [
                'kategori' => [
                    'required' => 'Kategori Jangan Dibiarkan Kosong !!',
                ]
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/kategori_update');
        }

        // mendapatkan input 
        $data = [
            'kategori_nama' => esc($this->request->getPost('kategori')),
            'kategori_slug' =>  strtolower(url_title(json_encode(esc($this->request->getPost('kategori')))))
        ];
        // memasukan data
        $this->kategoriUpdateAdminModel->updateKategori($id, $data);

        // return ke daftar kategori 
        return redirect()->to('kategori');
    }
}