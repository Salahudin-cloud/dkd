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
    public function countAllProgram()
    {
        return $this->db->table('program')
            ->countAllResults();
    }

    public function getSemuaProgramPublish()
    {
        return $this->db->table('program')
            ->select('*')
            ->where('program_status', 'publikasi')
            ->get()
            ->getResult();
    }
}
