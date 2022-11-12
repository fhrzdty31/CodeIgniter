<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Base';

        return view('templates/header', $data)
            . view('home/index')
            . view('templates/footer');
    }
}
