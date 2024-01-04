<?php


namespace App\Controllers;

class LogoutAdmin extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();


        $session->destroy();


        return redirect()->to('/login');
    }
}
