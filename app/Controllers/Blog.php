<?php

namespace App\Controllers;

class Blog extends BaseController
{

    public function index()
    {
        return view('blog');
    }

    public function detailBlog()
    {
        return view('detail_blog');
    }
}
