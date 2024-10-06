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

    public function getLastTransactionNumber($prefix)
    {
        $query = $this->like('id_transaksi', $prefix, 'after')
            ->orderBy('id_transaksi', 'DESC')
            ->first();

        if ($query) {
            $lastNumber = substr($query['id_transaksi'], strlen($prefix));
            return (int) $lastNumber;
        } else {
            return 0;
        }
    }

    public function addTransaksi($data)
    {
        return $this->db->table('transaksi')
            ->insert($data);
    }

    public function getAllTransaksi()
    {
        return $this->db->table('transaksi')
            ->select('transaksi.*, pengguna.pengguna_nama, program.program_judul')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->whereIn('status_pembayaran', ['menunggu_konfirmasi', 'berhasil'])
            ->orderBy('status_pembayaran', 'desc')
            ->orderBy('tanggal_transaksi', 'desc')
            ->get()
            ->getResultArray();
    }


    public function getAllTransaksii()
    {
        return $this->db->table('transaksi')
            ->select('transaksi.*, pengguna.pengguna_nama, program.program_judul')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where('status_pembayaran', 'berhasil')
            ->orderBy('status_pembayaran', 'desc')
            ->orderBy('tanggal_transaksi', 'desc')
            ->get()
            ->getResultArray();
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

    public function getTotalDonationsThisYear()
    {

        // Menghitung total donasi yang berhasil
        $totalDonations = $this->db->table('transaksi')
            ->selectSum('nominal_pembayaran')
            ->where('status_pembayaran', 'berhasil')
            ->where('info_transaksi !=', 'dana keluar')
            ->get()->getRow()->nominal_pembayaran;

        // Menghitung total dana keluar
        $totalFundsOut = $this->db->table('transaksi')
            ->selectSum('nominal_pembayaran')
            ->where('info_transaksi', 'dana keluar')
            ->get()->getRow()->nominal_pembayaran;

        // Mengurangi total donasi dengan total dana keluar
        $totalNetDonations = $totalDonations - $totalFundsOut;

        return $totalNetDonations;
    }


    public function getTotalDonationsThisMonth()
    {
        return $this->db->table('transaksi')
            ->selectSum('nominal_pembayaran')
            ->where('info_transaksi', 'dana keluar')
            ->get()->getRow()->nominal_pembayaran;
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

    public function getTransaksiByDate($dari, $sampai)
    {
        // Convert $dari and $sampai to date format (YYYY-MM-DD)
        $dariDate = date('Y-m-d', strtotime($dari));
        $sampaiDate = date('Y-m-d', strtotime($sampai));

        // echo $dariDate;
        // echo "<br>";
        // echo $sampaiDate;
        // exit;

        return $this->db->table('transaksi')
            ->select('transaksi.*, pengguna.pengguna_nama, program.program_judul')
            ->join('pengguna', 'pengguna.pengguna_id = transaksi.id_pengguna')
            ->join('program', 'program.program_id = transaksi.id_program')
            ->where("DATE(tanggal_transaksi) >= '$dariDate'")
            ->where("DATE(tanggal_transaksi) <= '$sampaiDate'")
            ->where('status_pembayaran', 'berhasil')
            ->orderBy('status_pembayaran', 'desc')
            ->orderBy('tanggal_transaksi', 'desc')
            ->get()->getResult();
    }


    public function updateTransaksi($id, $nominal)
    {

        return $this->db->table('transaksi')
            ->where('id_transaksi', $id)
            ->update([
                'nominal_pembayaran' => $nominal
            ]);
    }
}
