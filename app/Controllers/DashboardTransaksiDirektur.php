<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardTransaksiDirektur extends BaseController
{
    public function index()
    {
        return view('backend_pages/direktur/transaksi');
    }
}
