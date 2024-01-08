<?php


namespace App\Controllers;

use App\Models\ArtikelUpdateAdminModel;
use App\Models\KategoriAdminModel;

class ArtikelUpdateAdmin extends BaseController
{
    protected $artikelUpdateAdminModel;
    protected $kategoriAdminModel;
    public function __construct()
    {
        $this->artikelUpdateAdminModel = new ArtikelUpdateAdminModel();
        $this->kategoriAdminModel = new KategoriAdminModel();
    }

    public function index($id)
    {
        // ceck status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        $data = [
            'artikel' => $this->artikelUpdateAdminModel->getArtikelById($id),
            'kategori' => $this->kategoriAdminModel->getAllKategori()
        ];

        return view('backend_pages/admin/artikel_update', $data);
    }

    public function processUpdate($id)
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
            return redirect()->to('artikel_update/' . $id);
        }

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
                return redirect()->to('artikel_update/' . $id);
            }

            $oldArtikelCover = $this->artikelUpdateAdminModel->getArticleCoverById($id);
            if (!empty($oldArtikelCover)) {
                // mendapatkan nama file cover artikel lama
                $artikelCoverName = $oldArtikelCover->artikel_cover;

                // jika logo ada 
                if ($artikelCoverName) {
                    // define lokasi file untuk delete
                    $artikelPathDelete = FCPATH . '/assets/img/artikel/' . $artikelCoverName;

                    // check jika file ada 
                    if (file_exists($artikelPathDelete)) {
                        // melakukan delete file cover 
                        unlink($artikelPathDelete);
                    }
                }
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
            $this->artikelUpdateAdminModel->updateArtikel($id, $data);

            // redirec ke daftar list artikel
            return redirect()->to('artikell');
        }
        // jika tidak mengupdate artikel cover 
        // mendapatkan input
        $data = [
            'kategori_id' => esc($this->request->getPost('kategori_id')),
            'artikel_tanggal' => date('Y-m-d H:i:s'),
            'artikel_judul' => esc($this->request->getPost('artikel_judul')),
            'artikel_slug' => esc(strtolower(url_title(json_encode($this->request->getPost('artikel_judul'))))),
            'artikel_konten' => esc($this->request->getPost('artikel_konten')),
            'artikel_status' => esc($this->request->getPost('artikel_status'))
        ];

        // memasukan data ke database
        $this->artikelUpdateAdminModel->updateArtikel($id, $data);

        // redirec ke daftar list artikel
        return redirect()->to('artikell');
    }
}
