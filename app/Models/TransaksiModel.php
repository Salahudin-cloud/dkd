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
            ->whereIn('status_pembayaran', ['menunggu_konfirmasi', 'berhasil'])
            ->orderBy('status_pembayaran', 'desc')
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate(5);
    }


    public function getAllTransaksii()
    {
        return $this->table('transaksi')
            ->select('transaksi.*, pengguna.pengguna_nama, program.program_judul')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('status_pembayaran', 'berhasil')
            ->orderBy('status_pembayaran', 'desc')
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate(5);
    }

    public function getTransaksiByid($id)
    {
        return $this->db->table('transaksi')
            ->select('
                transaksi.id_transaksi, 
                transaksi.tanggal_transaksi, 
                transaksi.nominal_pembayaran, 
                transaksi.metode_pembayaran,
                transaksi.bukti_transaksi,
                pengguna.pengguna_nama, 
                pengguna.nomor_wa, 
                pengguna.alamat,
                program.program_judul
                ')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('id_transaksi', $id)
            ->get()
            ->getResult();
    }


    public function updateStatusPembayaranById($id)
    {
        return $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->update([
                'status_pembayaran' => 'berhasil'
            ]);
    }

    public function deleteTransaksiById($id)
    {
        return $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->delete();
    }

    public function getTotalDonaationsThisYear()
    {
        $thisYear = date('Y');
        return $this->db->table('transaksi')
            ->selectSum('nominal_pembayaran')
            ->where('YEAR(tanggal_transaksi)', $thisYear)
            ->where('status_pembayaran', 'berhasil')
            ->get()->getResult();
    }


    public function getTotalDonationsThisMonth()
    {
        $thisMonth = date('m');
        return $this->db->table('transaksi')
            ->selectSum('nominal_pembayaran')
            ->where('MONTH(tanggal_transaksi)', $thisMonth)
            ->where('status_pembayaran', 'berhasil')
            ->get()->getResult();
    }

    public function getTransaksiThisYear()
    {
        $thisYear = date('Y');
        return $this->db->table('transaksi')
            ->select('
                transaksi.id_transaksi, 
                transaksi.tanggal_transaksi, 
                transaksi.nominal_pembayaran, 
                transaksi.metode_pembayaran,
                pengguna.pengguna_nama,
                program.program_judul
                ')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('YEAR(tanggal_transaksi)', $thisYear)
            ->where('status_pembayaran', 'berhasil')
            ->get()->getResult();
    }

    public function getTransaksiThisMonth()
    {
        $thisMonth = date('m');
        return $this->db->table('transaksi')
            ->select('
                transaksi.id_transaksi, 
                transaksi.tanggal_transaksi, 
                transaksi.nominal_pembayaran, 
                transaksi.metode_pembayaran,
                pengguna.pengguna_nama, 
                program.program_judul
                ')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('MONTH(tanggal_transaksi)', $thisMonth)
            ->where('status_pembayaran', 'berhasil')
            ->get()->getResult();
    }
}
