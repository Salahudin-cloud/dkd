<?php


namespace App\Controllers;

use App\Models\UserManagementModel;

class UserManagementAdmin extends BaseController
{
    protected $userManagementModel;
    public function __construct()
    {
        $this->userManagementModel = new UserManagementModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        $data['users'] = $this->userManagementModel->getSemuaPengguna();

        return view('backend_pages/admin/user_management', $data);
    }


    public function tambahPenggunaView()
    {
        return view('backend_pages/admin/user_management_add');
    }
}
