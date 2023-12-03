<?php


namespace App\Controllers;


class UserManagementAdmin extends BaseController
{
    public function index()
    {
        return view('backend_pages/admin/user_management');
    }
}
