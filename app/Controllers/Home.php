<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'App ProPangan'
        ];
        return view('dashboard', $data);
    }
}
