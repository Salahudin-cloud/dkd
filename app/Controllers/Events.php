<?php

namespace App\Controllers;

class Events extends BaseController
{
    public function index()
    {
        return view('events');
    }

    public function detailEvents()
    {
        return view('detail_events');
    }
}
