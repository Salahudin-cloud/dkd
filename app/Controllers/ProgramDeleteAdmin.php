<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class ProgramDeleteAdmin extends BaseController
{
    protected $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    public function deleteProgramAdmin($id)
    {
        //mendapatkan program by id 
        $program = $this->programModel->getProgramById($id);

        //melakukan delete data pada database 
        $this->programModel->deleteProgramById($id);

        // melakukan delete data program cover pada folder img
        if ($program->program_cover) {
            $coverPath = FCPATH . 'assets/img/program/' . $program->program_cover;

            if (file_exists($coverPath)) {
                unlink($coverPath);
            }
        }

        //redirect ke halaman artikel 
        return redirect()->to('/programs');
    }
}
