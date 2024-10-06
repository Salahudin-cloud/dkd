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
        'nomor_wa',
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
    public function addPenggunaBaru($nama, $username, $password, $no_wa, $alamat)
    {
        return $this->db->table('pengguna')->insert(
            [
                'pengguna_nama' => $nama,
                'username' => $username,
                'password' => md5($password),
                'nomor_wa' => $no_wa,
                'role' => 'donatur',
                'alamat' => $alamat
            ]
        );
    }

    public function getSemuaPengguna()
    {
        return $this->db->table('pengguna')
        ->where('role',  'donatur')
        ->get()
        ->getResultArray();
    }

    public function getPenggunaById($id)
    {
        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->get()
            ->getRow();
    }

    public function updatePenggunaById($id, $nama, $username, $password, $no_wa, $alamat, $role)
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

        if (!empty($no_wa)) {
            $data['nomor_wa'] = $no_wa;
        }

        if (!empty($alamat)) {
            $data['alamat'] = $alamat;
        }


        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->update($data);
    }

    public function deletePenggunaById($id)
    {
        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->delete();
    }

    public function getAllDonatur()
    {
        return $this->db->table('pengguna')
            ->select('*')
            ->where('role', 'donatur')
            ->get()
            ->getResultObject();
    }
}
