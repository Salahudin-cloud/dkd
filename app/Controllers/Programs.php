<?php

namespace App\Controllers;

use App\Models\ProgramAdminModel;

class Programs extends BaseController
{

    protected $programAdminModel;
    public function __construct()
    {
        $this->programAdminModel = new ProgramAdminModel();
    }

    public function index()
    {
        $data = [
            'program' => $this->programAdminModel->getSemuaProgramPublish()
        ];
        return view('frontend_pages/program', $data);
    }

    public function detailProgram()
    {
        return view('detail_program');
    }
}
