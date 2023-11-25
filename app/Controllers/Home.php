<?php

namespace App\Controllers;

class Home extends BaseController
{
    // frontend landing page 
    public function index(): string
    {
        return view('index');
    }
}
