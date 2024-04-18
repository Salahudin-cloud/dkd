<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields =
    [
        'id_transaksi ',
        'id_donatur ',
        'id_program',
        'tanggal_transaksi',
        'metode_pembayaran',
        'nominal_donasi ',
        'status_pembayaran',
        'bukti_transaksi'
    ];

    public function getLastTransactionNumber()
    {
        $query = $this->select('id_transaksi')
            ->orderBy('id_transaksi', 'DESC')
            ->first();

        return $query ? (int) substr($query['id_transaksi'], -1) : 0;
    }

    public function addTransaksi($data)
    {
        return $this->db->table('transaksi')
            ->insert($data);
    }

    public function getAllTransaksi()
    {
        return $this->table('transaksi')
            ->select('transaksi.*, pengguna.pengguna_nama, program.program_judul')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('status_pembayaran', 'menunggu_konfirmasi')
            ->orderBy('tanggal_transaksi', 'asc')
            ->paginate(5);
    }
}
