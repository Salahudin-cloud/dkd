<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
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

    //cek users password
    public function validateUser($username, $password)
    {
        $query = $this->db->table('pengguna')
            ->where('username', $username)
            ->where('password', md5($password))->get()->getRow();
        return $query;
    }
}
