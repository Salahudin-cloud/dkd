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
            'pager' => $this->transaksiModel->pager
        ];


        return view('backend_pages/admin/transaksi', $data);
    }


    public function checkTransaksi($id)
    {
        
    }
}
