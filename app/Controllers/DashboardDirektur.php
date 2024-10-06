<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class DashboardDirektur extends BaseController
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
            'total' => $this->transaksiModel->getTotalDonationsThisYear(),
            'keluar' => $this->transaksiModel->getTotalDonationsThisMonth(),
        ];


        echo view('backend_pages/direktur/dashboard', $data);
    }
}
