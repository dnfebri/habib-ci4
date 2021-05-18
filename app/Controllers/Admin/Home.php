<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'user' => 'admin',
            'title' => 'Habid | Admin'
        ];
        return view('admin/home/index', $data);
    }

    public function about()
    {
        $data = [
            'user' => 'admin',
            'title' => 'Habid | Admin'
        ];
        return view('admin/home/about', $data);
    }
}
