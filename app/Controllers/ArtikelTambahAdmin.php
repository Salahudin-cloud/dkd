<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

use App\Models\KategoriModel;

class ArtikelTambahAdmin extends BaseController
{
    protected $kategoriAdminModel;
    protected $artikelModel;
    public function __construct()
    {
        $this->kategoriAdminModel = new KategoriModel();
        $this->artikelModel = new ArtikelModel();
    }
    public function index()
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        // mendapatkan semua kategori 
        $data['kategori'] = $this->kategoriAdminModel->getAllKategori();
        return view('backend_pages/admin/artikel_tambah', $data);
    }

    public function processTambah()
    {
        $session = session();
        // set time zone 
        date_default_timezone_set('Asia/Jakarta');
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'artikel_judul' => 'required',
                'artikel_konten' => 'required',
                'kategori_id' => 'required',
            ],
            [
                'artikel_judul' => [
                    'required' => 'Judul Artikel Jangan Dibiarkan Kosong !!',
                ],
                'artikel_konten' => [
                    'required' => 'Konten Artikel Jangan Dibiarkan Kosong!!',
                ],
                'kategori_id' => [
                    'required' => 'Kategori Artikel Jangan Dibiarkan Kosong!!',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('/artikel_tambah');
        }


        // mengecek jika judul artikel sudah ada 
        $judul = $this->artikelModel->getArtikelByJudul(esc($this->request->getPost('article_title')));

        if (count($judul) > 0) {
            $errors['artikel_judul'] = 'Judul Artikel Sudah Ada!!';
            $session->setFlashdata('errors', $errors);
            // show message  error it will return in the page with error message
            return redirect()->to('artikel_tambah');
        } else {
            // menghandle tentang artikel cover 
            $artikelCoverFile = $this->request->getFile('artikel_cover');
            if ($artikelCoverFile->isValid()) {
                // Define path to upload
                $uploadPath = './assets/img/artikel';

                // mendefinisakan apa saja yang bolek di upload 
                $allowedTypes = ['jpg', 'jpeg', 'png'];
                $fileExtension = $artikelCoverFile->getExtension();

                // jika tidak sama dengan yang dibolehkan
                if (!in_array($fileExtension, $allowedTypes)) {
                    $errors['artikel_cover'] = 'Hanya JPG and PNG or JPEG file  saja yang diperbolehkan!';
                    $session->setFlashdata('errors', $errors);
                    return redirect()->to('artikel_tambah');
                }

                // melakukan file upload 
                $artikelCoverFile->move($uploadPath);

                // mendapatkan nama file 
                $artikel_cover = $artikelCoverFile->getClientName();

                // mendapatkan input
                $data = [
                    'kategori_id' => esc($this->request->getPost('kategori_id')),
                    'artikel_tanggal' => date('Y-m-d H:i:s'),
                    'artikel_judul' => esc($this->request->getPost('artikel_judul')),
                    'artikel_slug' => esc(strtolower(url_title(json_encode($this->request->getPost('artikel_judul'))))),
                    'artikel_konten' => esc($this->request->getPost('artikel_konten')),
                    'artikel_cover' => $artikel_cover,
                    'artikel_status' => esc($this->request->getPost('artikel_status'))
                ];


                // memasukan data ke database
                $this->artikelModel->addArtikelBaru($data);

                // redirec ke daftar list artikel
                return redirect()->to('artikell');
            } else {
                $errors['artikel_cover'] = 'Silahkan Pilih gambar untuk  Artikel Cover!';
                $session->setFlashdata('errors', $errors);
                return redirect()->to('artikel_tambah');
            }
        }
    }
}
