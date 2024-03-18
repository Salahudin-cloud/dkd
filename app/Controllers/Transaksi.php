<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        return view('backend_pages/admin/transaksi');
    }
}
