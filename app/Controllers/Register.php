<?php


namespace App\Controllers;

use App\Models\PenggunaModel;

class Register extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index()
    {
        return view('backend_pages/register');
    }

    public function registerProcess()
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
            'alamat' => 'required'
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('register');
        }

        // mendapatkan data 
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $no_wa = $this->request->getPost('no_wa');
        $alamat = $this->request->getPost('alamat');

        // check if username exists 
        if (!empty($this->penggunaModel->getPenggunaByUsername($username))) {
            $session->setFlashdata('error', 'invalid');
            return redirect()->to('/register');
        }

        // melaukan penambahan ke database 
        $this->penggunaModel->addPenggunaBaru($nama, $username, $password, $no_wa, $alamat);

        return redirect()->to('/login');
    }
}
