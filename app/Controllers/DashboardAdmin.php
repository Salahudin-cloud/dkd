<?php


namespace App\Controllers;

use App\Models\ArtikelAdminModel;
use App\Models\DashboardModel;
use App\Models\KategoriAdminModel;
use App\Models\ProgramAdminModel;

class DashboardAdmin extends BaseController
{

    protected $dashboardModel;

    protected $artikelAdminModel;
    protected $kategoriAdminModel;
    protected $programAdminModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->artikelAdminModel = new ArtikelAdminModel();
        $this->kategoriAdminModel = new KategoriAdminModel();
        $this->programAdminModel = new ProgramAdminModel();
    }
    public function index()
    {
        // cek status login 
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/login');
        }
        // mamasukan jumlah ke dalam varable data
        $data = [
            'jumlah_pengguna' => $this->dashboardModel->getTotalPengguna(),
            'jumlah_artikel' => $this->artikelAdminModel->countAllArtikel(),
            'jumlah_kategori' => $this->kategoriAdminModel->countAllKategori(),
            'jumlah_program'  => $this->programAdminModel->countAllProgram()
        ];

        return view('backend_pages/admin/dashboard', $data);
    }
}
