<?php


namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\PenggunaModel;
use App\Models\KategoriModel;
use App\Models\ProgramModel;

class DashboardAdmin extends BaseController
{

    protected $penggunaModel;
    protected $artikelModel;
    protected $kategoriModel;
    protected $programModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->artikelModel = new ArtikelModel();
        $this->kategoriModel = new KategoriModel();
        $this->programModel = new ProgramModel();
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
            'jumlah_pengguna' => $this->penggunaModel->getTotalPengguna(),
            'jumlah_artikel' => $this->artikelModel->countAllArtikel(),
            'jumlah_kategori' => $this->kategoriModel->countAllKategori(),
            'jumlah_program'  => $this->programModel->countAllProgram()
        ];

        return view('backend_pages/admin/dashboard', $data);
    }
}
