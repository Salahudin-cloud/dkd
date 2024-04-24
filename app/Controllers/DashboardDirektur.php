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
    
        $data = [
            'year' => $this->transaksiModel->getTotalDonaationsThisYear(),
            'month' => $this->transaksiModel->getTotalDonationsThisMonth(),
        ];

        echo view('backend_pages/direktur/dashboard', $data);
    }
}
