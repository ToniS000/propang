<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SimPangan | Home'
        ];
        return view('home', $data);
    }
}
