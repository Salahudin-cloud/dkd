<?php

namespace App\Controllers;

use App\Models\ProgramAdminModel;
use App\Models\ProgramDeleteAdminModel;

class ProgramDeleteAdmin extends BaseController
{
    protected $programDeleteAdminModel;

    public function __construct()
    {
        $this->programDeleteAdminModel = new ProgramDeleteAdminModel();
    }

    public function deleteProgramAdmin($id)
    {
        //mendapatkan program by id 
        $program = $this->programDeleteAdminModel->getProgramById($id);

        //melakukan delete data pada database 
        $this->programDeleteAdminModel->deleteProgramById($id);

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
