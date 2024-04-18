<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class UserManagementDelete extends BaseController
{
    protected $penggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }
    public function index($id)
    {
        // melakukan delete pengguna
        $this->penggunaModel->deletePenggunaById($id);

        return redirect()->to('users_management');
    }
}
