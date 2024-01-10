<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriTambahAdmin extends BaseController
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
        return view('backend_pages/admin/kategori_tambah');
    }


    public function processTambahKategori()
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
            return redirect()->to('/kategori_tambah');
        }

        // mendapatkan input 
        $data = [
            'kategori_nama' => esc($this->request->getPost('kategori')),
            'kategori_slug' =>  strtolower(url_title(json_encode(esc($this->request->getPost('kategori')))))
        ];
        // memasukan data
        $this->kategoriModel->insertKategoriBaru($data);

        // return ke daftar kategori 
        return redirect()->to('kategori');
    }
}
