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


    public function donwloadTransaksiBulanini()
    {

        date_default_timezone_set('Asia/Jakarta');

        $data = ['transaksi' =>  $this->transaksiModel->getTransaksiThisMonth()];

        $month = date('F');
        $year = date('Y');

        $html = view('templates/pdf_template/laporan_perBulan', $data);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, 'Laporan_Transaksi_Donasi_Bulan' . '_' . $year, false, 'A4', 'landscape');

        // Path to save the PDF file
        $path = './assets/laporan_transaksi/bulanan/' . 'Laporan_Transaksi_Donasi_Bulan' . '_' . $month . '_' . $year . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        usleep(500000);

        // Output the PDF to browser
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="Laporan_Transaksi_Donasi_Bulan' . '_' . $month . '_' . $year . '.pdf"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($path));
        header('Accept-Ranges: bytes');
        readfile($path);
        exit();
    }
}
