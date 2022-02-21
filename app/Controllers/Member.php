<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Member extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'App ProPangan'
        ];
        return view('member/user', $data);
    }
}
