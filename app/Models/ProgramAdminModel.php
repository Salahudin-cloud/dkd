<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramAdminModel extends Model
{
    protected $table = 'program';

    protected $allowedFields =
    [
        'program_target',
        'program_terkumpul',
        'program_judul ',
        'program_detail',
        'program_cover'
    ];


    public function getSemuaProgram()
    {
        return $this->db->table('program')
            ->get()
            ->getResult();
    }
}
