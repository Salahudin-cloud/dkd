<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
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

    public function getTotalPengguna()
    {
        return $this->db->table('pengguna')
            ->countAllResults();
    }

    public function getPenggunaByUsername($username)
    {
        return $this->db->table('pengguna')
            ->where('username', $username)
            ->get()->getResult();
    }
    public function addPenggunaBaru($nama, $username, $password)
    {
        return $this->db->table('pengguna')->insert(
            [
                'pengguna_nama' => $nama,
                'username' => $username,
                'password' => md5($password),
                'role' => 'donatur'
            ]
        );
    }

    public function getSemuaPengguna()
    {
        return $this->db->table('pengguna')
            ->get()->getResult();
    }
}
