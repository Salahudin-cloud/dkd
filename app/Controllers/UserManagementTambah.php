<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PenggunaModel;

class UserManagementTambah extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        return view('backend_pages/admin/user_management_add');
    }


    public function tambahProcessProses()
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules([
            'nama' => 'required',
            'username' => 'required|alpha_numeric',
            'password' => 'required',
            'no_wa' => 'required|max_length[11]',
            'user_level' => 'required'
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('tambah_pengguna');
        }

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $no_wa = $this->request->getPost('no_wa');

        // check if username exists 
        if (!empty($this->penggunaModel->getPenggunaByUsername($username))) {
            $session->setFlashdata('error', 'invalid');
            return redirect()->to('/tambah_pengguna');
        }

        // melaukan penambahan ke database 
        $this->penggunaModel->addPenggunaBaru($nama, $username, $password, $no_wa);

        return redirect()->to('/users_management');
    }
}
