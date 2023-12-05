<?php

namespace App\Models;

use CodeIgniter\Model;


class UserManagementModel extends Model
{
    // dedfine table name 
    protected $table = 'pengguna';

    protected $allowedFields =
    [
        'pengguna_nama',
        'username',
        'password',
        'role'
    ];

    public function getSemuaPengguna()
    {
        return $this->db->table('pengguna')
            ->get()
            ->getResult();
    }
}
