<?php


namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\DashboardModel;
use App\Models\KategoriModel;
use App\Models\ProgramAdminModel;

class DashboardAdmin extends BaseController
{

    protected $dashboardModel;

    protected $artikelModel;
    protected $kategoriModel;
    protected $programAdminModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
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
            'jumlah_artikel' => $this->artikelModel->countAllArtikel(),
            'jumlah_kategori' => $this->kategoriModel->countAllKategori(),
            'jumlah_program'  => $this->programAdminModel->countAllProgram()
        ];

        return view('backend_pages/admin/dashboard', $data);
    }
}
