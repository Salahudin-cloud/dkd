<?php

namespace App\Models;

use CodeIgniter\Model;
use JsonSerializable;

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

    public function getPenggunaById($id)
    {
        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->get()
            ->getRow();
    }

    public function updatePenggunaById($id, $nama, $username, $password, $role)
    {
        $data = [
            'pengguna_nama' => $nama,
            'role' => $role
        ];

        if (!empty($username)) {
            $data['username'] = $username;
        }

        if (!empty($password)) {
            $data['password'] = md5($password);
        }

        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->update($data);
    }
}
