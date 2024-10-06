<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class DashboardTransaksiDirektur extends BaseController
{
    protected $transaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }

        $data = [
            'all_transaksi' => $this->transaksiModel->getAllTransaksii(),
            'pager' => $this->transaksiModel->pager
        ];


        return view('backend_pages/direktur/transaksi', $data);
    }

    public function donwloadTransaksiTahunini()
    {
        $data = ['transaksi' =>  $this->transaksiModel->getTransaksiThisYear()];


        $thisYear = date('Y');

        $html = view('templates/pdf_template/laporan_pertahun', $data);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, 'Laporan Transaksi Donasi Tahun' . '_' . $thisYear, false, 'A4', 'landscape');

        // Path to save the PDF file
        $path = './assets/laporan_transaksi/tahunan/' . 'Laporan_Transaksi_Donasi_Tahun' . '_' . $thisYear . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        usleep(500000);

        // Output the PDF to browser
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="Laporan_Transaksi_Donasi_Tahun' . '_' . $thisYear . '.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($path));
        header('Accept-Ranges: bytes');
        readfile($path);
        exit();
    }


    public function cetakLaporan()
    {
        return view('backend_pages/direktur/cetak_laporan');
    }

    public function cetakLaporanProcess()
    {


        date_default_timezone_set('Asia/Jakarta');
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'dari' => 'required',
                'sampai' => 'required'
            ],
            [
                'dari' => [
                    'required' => 'Kategori Jangan Dibiarkan Kosong !!',
                ],
                'sampai' => [
                    'required' => 'Kategori Jangan Dibiarkan Kosong !!',
                ],
            ]
        );


        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/cetak_laporan');
        }

        $dari = $this->request->getPost('dari');
        $sampai = $this->request->getPost('sampai');


        // query data by date 

        $data = ['transaksi' =>  $this->transaksiModel->getTransaksiByDate($dari, $sampai)];

        $html = view('templates/pdf_template/laporan_transaksi', $data);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, 'Laporan Transaksi Donasi', false, 'A4', 'landscape');

        // Path to save the PDF file
        $path = './assets/laporan_transaksi/' . 'Laporan_Transaksi_Donasi' . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        usleep(500000);

        // Redirect to index method with file existence flag
        return $this->response->download($path, null)->setFileName('Laporan Transaksi Donasi' . '_' .  'dicetak_oleh' . '_' . session()->nama . '.pdf');
    }
}
