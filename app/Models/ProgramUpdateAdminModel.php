<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramUpdateAdminModel extends Model
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


    public function getProgramById($id)
    {
        return $this->db->table('program')
            ->where('program_id', $id)
            ->get()
            ->getRow();
    }

    public function getProgramByJudul($judul)
    {
        return $this->db->table('program')
            ->where('program_judul', $judul)
            ->get()
            ->getResult();
    }

    public function updateProgram($id, $data)
    {
        return $this->db->table('program')
            ->where('program_id', $id)
            ->update($data);
    }

    public function getProgramCoverById($id)
    {
        return $this->db->table('program')
            ->select('program_cover')
            ->where('program_id', $id)
            ->get()
            ->getRow();
    }
}
