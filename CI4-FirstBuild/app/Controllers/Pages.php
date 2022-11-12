<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data['title'] = 'Base';

        return view('templates/header', $data)
            . view('pages/index')
            . view('templates/footer');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Ups, kami tidak memiliki halaman untuk itu!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Kapitalisasi huruf pertama

        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}