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
        date_default_timezone_set('Asia/Jakarta');

        $validate = \Config\Services::validation();
        $validate->setRules([
            'jumlah_donasi' => 'required|positiveNumber',
        ]);

        if (!$validate->withRequest($this->request)->run()) {
            $session->setFlashdata('error', 'failed');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }

        $prefix = 'DKD';
        $yearNow = date('Y');
        $monthNow = date('m');

        $lastTransactionNumber = $this->transaksiModel->getLastTransactionNumber($prefix . $yearNow . $monthNow);
        $nextTransactionNumber = $lastTransactionNumber + 1;
        $transactionID = $prefix . $yearNow . $monthNow . $nextTransactionNumber;

        // echo json_encode($transactionID);
        // exit;


        $gambarBuktiTransaksi = $this->request->getFile('bukti_transaksi');

        if (!$gambarBuktiTransaksi->isValid()) {
            $session->setFlashdata('error', 'failed_1');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }

        $pathUploadTransaksi = './assets/img/transaksi';
        $allowedTypes = ['jpg', 'jpeg', 'png'];
        $getExtension = $gambarBuktiTransaksi->getExtension();

        if (!in_array($getExtension, $allowedTypes)) {
            $session->setFlashdata('error', 'failed_2');
            return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
        }

        $gambarBuktiTransaksi->move($pathUploadTransaksi);

        $data = [
            'id_transaksi' => $transactionID,
            'id_pengguna' => $this->request->getPost('pengguna_id'),
            'id_program' => $this->request->getPost('program_id'),
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'nominal_pembayaran' => $this->request->getPost('jumlah_donasi'),
            'status_pembayaran' => 'menunggu_konfirmasi',
            'bukti_transaksi' => $gambarBuktiTransaksi->getClientName(),
            'info_transaksi' => 'dana masuk'
        ];

        $this->transaksiModel->addTransaksi($data);

        return redirect()->to('detail_program/' . strtolower(url_title(json_encode($this->request->getPost('program_judul')))));
    }


}
