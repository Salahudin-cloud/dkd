<?php

namespace App\Controllers;

class KategoriAdmin extends BaseController
{
    public function index()
    {
        return view('backend_pages/admin/category');
    }
}
