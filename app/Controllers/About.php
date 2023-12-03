<?php

namespace App\Controllers;

class About extends BaseController
{

    public function index(): string
    {
        return view('frontend_pages/about');
    }
}
