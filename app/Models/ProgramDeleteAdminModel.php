<?php


namespace App\Models;

use CodeIgniter\Model;

class ProgramDeleteAdminModel extends Model
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


    public function deleteProgramById($id)
    {
        return $this->db->table('program')
            ->where('program_id', $id)
            ->delete();
    }
}
