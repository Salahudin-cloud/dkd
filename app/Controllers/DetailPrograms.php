<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class DetailPrograms extends BaseController
{
    protected $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }
    public function index($slug)
    {
        $data = [
            'program' => $this->programModel->getProgramBySlug($slug)
        ];

        return view('frontend_pages/detail_program', $data);
    }
}
