<?php

namespace App\Controllers;

use App\Models\ArtikelDeleteAdminModel;

class ArtikelDeleteAdmin extends BaseController
{
    protected $artikelDeleteAdminModel;

    public function __construct()
    {
        $this->artikelDeleteAdminModel = new ArtikelDeleteAdminModel();
    }
    public function deleteArtikel($id)
    {
        //mendapatkan artikel by id 
        $artikel = $this->artikelDeleteAdminModel->getArtikelById($id);

        //melakukan delete data pada database 
        $this->artikelDeleteAdminModel->deleteArtikelById($id);

        // melakukan delete data artikel cover pada folder img
        if ($artikel->artikel_cover) {
            $coverPath = FCPATH . 'assets/img/artikel/' . $artikel->artikel_cover;

            if (file_exists($coverPath)) {
                unlink($coverPath);
            }
        }

        //redirect ke halaman artikel 
        return redirect()->to('/artikel');
    }
}
