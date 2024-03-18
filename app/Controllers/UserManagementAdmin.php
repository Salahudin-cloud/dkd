<?php


namespace App\Controllers;

use App\Models\PenggunaModel;

class UserManagementAdmin extends BaseController
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
            return redirect()->to('/');
        }

        $data['users'] = $this->penggunaModel->getSemuaPengguna();

        return view('backend_pages/admin/user_management', $data);
    }



}
