<?php

namespace App\Controllers;

class Blog extends BaseController
{

    public function index()
    {
        return view('frontend_pages/blog');
    }

}
