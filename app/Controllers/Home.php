<?php

namespace App\Controllers;

class Home extends BaseController
{
    // frontend landing page 
    public function index(): string
    {
        return view('index');
    }


    // frontend about page 
    public function aboutView(): string
    {
        return view('about');
    }

    // frontend program page 
    public function programView(): string
    {
        return view('program');
    }
}
