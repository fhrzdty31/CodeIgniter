<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home"
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => "About Me"
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => "Contact",
            'alamat' => [
                [
                    'tipe' => "rumah",
                    'alamat' => "JL. qwerty No. 10",
                    'kota' => "Kediri"
                ],
                [
                    'tipe' => "kantor",
                    'alamat' => "JL. abcdef No. 23",
                    'kota' => "Malang"
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
