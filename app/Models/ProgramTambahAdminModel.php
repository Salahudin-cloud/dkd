<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramTambahAdminModel extends Model
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

    public function getProgramByJudul($judul)
    {
        return $this->db->table('program')
            ->where('program_judul', $judul)
            ->get()
            ->getResult();
    }

    public function addProgramBaru($data)
    {
        return $this->db->table('program')
        ->insert($data);
    }
}
