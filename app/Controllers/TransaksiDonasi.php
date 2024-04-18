<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class TransaksiDonasi extends BaseController
{
    protected $transaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {

        $session = session();
        // set time zone 
        date_default_timezone_set('Asia/Jakarta');
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules([
            'jumlah_donasi' => 'required|positiveNumber',
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }


        // generation id transaction 
        $prefix = 'TN';
        $yearNow = date('Y');
        $monthNow = date('m');

        // Fetch the last transaction number from the database
        $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber();
        $nextTransactionNumber = $lastTransactionNumber + 1;
        $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;



        $gambarBuktiTransaksi = $this->request->getFile('bukti_transaksi');

        //jika upload gagal 
        if (!$gambarBuktiTransaksi->isValid()) {
            $session->setFlashdata('error', 'failed_1');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }

        //mendefinisikan path upload 
        $pathUploadTransaksi = './assets/img/transaksi';

        // definisikan extension yang boleh di upload 
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $getExtension = $gambarBuktiTransaksi->getExtension();

        // jika  yang diupload selain gambar 
        if (!in_array($getExtension, $allowedTypes)) {
            $session->setFlashdata('error', 'failed_2');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }


        // upload file 
        $gambarBuktiTransaksi->move($pathUploadTransaksi);

        // mendapatkan input 
        $data = [
            'id_transaksi' => $transactionID,
            'id_pengguna' => $this->request->getPost('pengguna_id'),
            'id_program' => $this->request->getPost('program_id'),
            'tanggal_transaksi' =>  date('Y-m-d H:i:s'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'nominal_pembayaran' => $this->request->getPost('jumlah_donasi'),
            'status_pembayaran' => 'menunggu_konfirmasi',
            'bukti_transaksi' => $gambarBuktiTransaksi->getClientName()
        ];


        // upload data to database
        $this->transaksiModel->addTransaksi($data);

        //redirect back in same page
        return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
    }
}
