<?php


namespace App\Models;

use CodeIgniter\Model;


class DashboardModel extends Model
{
    protected $table = 'pengguna';


    public function getTotalPengguna()
    {
        return $this->db->table('pengguna')
            ->countAllResults();
    }
}
