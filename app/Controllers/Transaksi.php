<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }


        $data = [
            'transaksi_data' => $this->transaksiModel->getAllTransaksi(),
            'pager' => $this->transaksiModel->pager,
         
        ];


        return view('backend_pages/admin/transaksi', $data);
    }


    public function checkTransaksi($id)
    {
        $data = $this->transaksiModel->getTransaksiByid($id);

        // Load the view and render it as a string
        $html = view('templates/pdf_template/invoice_donasi', [
            'id_transaksi' => $data[0]->id_transaksi,
            'tanggal_transaksi' => $data[0]->tanggal_transaksi,
            'nominal_pembayaran' => $data[0]->nominal_pembayaran,
            'pengguna_nama' => $data[0]->pengguna_nama,
            'nomor_wa' => $data[0]->nomor_wa,
            'program_judul' => $data[0]->program_judul
        ]);

        // Generate PDF using the helper function
        $pdf = generate_pdf($html, $data[0]->id_transaksi . '_' . $data[0]->pengguna_nama, false);

        // Path to save the PDF file
        $path = './assets/invoice_pdf/' . $data[0]->id_transaksi . '_' . strtolower(url_title($data[0]->pengguna_nama)) . '.pdf';

        // Save the PDF file to the server
        file_put_contents($path, $pdf);

        // Check if the file exists after a short delay to ensure it's written
        usleep(500000); // Wait for 0.5 seconds

        // Redirect to index method with file existence flag
        return redirect()->to('transaksi');
    }
}
