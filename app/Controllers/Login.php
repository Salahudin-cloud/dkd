<?php


namespace App\Controllers;

use App\Models\PenggunaModel;

class Login extends BaseController
{

    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        return view('backend_pages/login');
    }

    public function validasi()
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules([
            'username' => 'required|alpha_numeric',
            'password' => 'required'
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('/login');
        }

        // mendapatkan data 
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // validasi form input 
        //query pengguna berdasakan masukan form 
        $data = $this->penggunaModel->validateUser($username, $password);

        if (!empty($data)) {
            // set cookie 
            $session->set([
                "id" => $data->id_pengguna,
                "nama" => $data->pengguna_nama,
                "username" => $data->username,
                "password" => $data->password,
            ]);

            // cek role pengguna
            switch ($data->role) {
                case 'admin':
                    $session->set('role', 'admin');
                    return redirect()->to('/dashboard');
                    break;
                default:
                    $session->set('role', 'user');
                    return redirect()->to('/homepage');
                    break;
            }
        } else {
            $session->setFlashdata('error', 'invalid');
            return redirect()->to('/login');
        }
    }
}
