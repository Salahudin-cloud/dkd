<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class ArtikelDeleteAdmin extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }
    public function deleteArtikel($id)
    {
        //mendapatkan artikel by id 
        $artikel = $this->artikelModel->getArtikelById($id);

        //melakukan delete data pada database 
        $this->artikelModel->deleteArtikelById($id);

        // melakukan delete data artikel cover pada folder img
        if ($artikel->artikel_cover) {
            $coverPath = FCPATH . 'assets/img/artikel/' . $artikel->artikel_cover;

            if (file_exists($coverPath)) {
                unlink($coverPath);
            }
        }

        //redirect ke halaman artikel 
        return redirect()->to('/artikell');
    }
}
