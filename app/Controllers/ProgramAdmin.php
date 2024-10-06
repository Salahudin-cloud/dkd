<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class ProgramAdmin extends BaseController
{

    protected $programModel;
    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    public function index()
    {
        // cek status login 
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        // get all program 
        $data = [
            'program' => $this->programModel->getSemuaProgramAdmin(),
        ];
        return view('backend_pages/admin/program', $data);
    }
}
