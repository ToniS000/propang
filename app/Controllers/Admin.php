<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SimPangan | Admin'
        ];
        return view('admin/dashboard', $data);
    }
}
