<?php

namespace App\Controllers;

class Programs extends BaseController
{

    public function index()
    {
        return view('program');
    }

    public function detailProgram()
    {
        return view('detail_program');
    }
}