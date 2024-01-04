<?php

namespace App\Controllers;

use App\Models\ProgramAdminModel;

class ProgramAdmin extends BaseController
{

    protected $programAdminModel;
    public function __construct()
    {
        $this->programAdminModel = new ProgramAdminModel();
    }

    public function index()
    {
        // cek status login 
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        // get all program 
        $data['program'] = $this->programAdminModel->getSemuaProgram();
        return view('backend_pages/admin/program', $data);
    }
}
