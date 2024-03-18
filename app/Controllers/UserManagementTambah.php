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
            'password' => 'required'
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('users_management');
        }

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // check if username exists 
        if (!empty($this->penggunaModel->getPenggunaByUsername($username))) {
            $session->setFlashdata('error', 'invalid');
            return redirect()->to('/tambah_pengguna');
        }

        // melaukan penambahan ke database 
        $this->penggunaModel->addPenggunaBaru($nama, $username, $password);

        return redirect()->to('/users_management');
    }
}
