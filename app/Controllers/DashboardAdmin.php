<?php


namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        return view('backend_pages/admin/dashboard');
    }
}
