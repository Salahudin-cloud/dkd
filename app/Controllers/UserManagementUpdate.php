<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use PhpParser\Node\Stmt\If_;

class UserManagementUpdate extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index($id)
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('login');
        }
        $data = [
            'user' => $this->penggunaModel->getPenggunaById($id)
        ];
        return view('backend_pages/admin/user_management_update', $data);
    }
    public function updateProces($id)
    {
        $session = session();
        $validate = \Config\Services::validation();
        $validate->setRules([
            'nama' => 'required',
            'user_level' => 'required'
        ]);
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('update_pengguna/' . $id);
        }

        $username =  $this->request->getPost('username') ?? '';
        $nama = $this->request->getPost('nama');
        $role = $this->request->getPost('user_level');
        $password =  $this->request->getPost('password') ?? '';

        if (!empty($username)) {
            $existingUser = $this->penggunaModel->getPenggunaByUsername($username);
            if (!empty($existingUser)) {
                $session->setFlashdata('error', 'invalid');
                return redirect()->to('update_pengguna/' . $id);
            }
        }

        // Catch input form and execute update query
        $this->penggunaModel->updatePenggunaById(
            $id,
            $nama,
            $username,
            $password,
            $role
        );

        return redirect()->to('users_management');
    }
}
