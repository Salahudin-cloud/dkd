<?php


namespace App\Models;

use CodeIgniter\Model;


class DashboardModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields =
    [
        'pengguna_nama',
        'username',
        'password',
        'role'
    ];

    public function getTotalPengguna()
    {
        return $this->db->table('pengguna')
            ->countAllResults();
    }
}
