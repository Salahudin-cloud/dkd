<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ArtikelCari extends BaseController
{
    public function index()
    {
        echo $this->request->getGet('q');
        exit;
    }
}
