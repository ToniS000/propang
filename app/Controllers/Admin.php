<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'App ProPangan'
        ];
        return view('admin/dashboard', $data);
    }
}
