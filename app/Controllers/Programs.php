<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class Programs extends BaseController
{

    protected $programModel;
    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    public function index()
    {
        $data = [
            'program' => $this->programModel->getSemuaProgramPublish()
        ];
        return view('frontend_pages/program', $data);
    }

    public function detailProgram()
    {
        return view('detail_program');
    }
}
