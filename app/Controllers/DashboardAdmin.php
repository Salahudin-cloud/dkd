<?php


namespace App\Controllers;

use App\Models\DashboardModel;

class DashboardAdmin extends BaseController
{

    protected $dashboardModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
    }
    public function index()
    {
        // cek status login 
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }

        // mamasukan jumlah ke dalam varable data
        $data['jumlah_pengguna'] = $this->dashboardModel->getTotalPengguna();

        return view('backend_pages/admin/dashboard', $data);
    }
}
