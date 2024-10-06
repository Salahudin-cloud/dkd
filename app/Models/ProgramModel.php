<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
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

    public function getSemuaProgramAdmin()
    {
        return $this->db->table('program')
        ->get()
        ->getResultArray();
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

    public function getProgramBySlug($slug)
    {
        return $this->db->table('program')
            ->select('*')
            ->where('program_slug', $slug)
            ->get()->getResult();
    }

    public function getDefaultProgram()
    {
        return $this->db->table('program')
            ->select('*')
            ->where('program_id', 12)
             ->get()->getResult();
    }
}
