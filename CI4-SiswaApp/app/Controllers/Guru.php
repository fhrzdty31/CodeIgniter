<?php

namespace App\Controllers;

use App\Models\Guru_model;

class Guru extends BaseController
{
    protected $guru_model;

    public function __construct()
    {
        $this->guru_model = new Guru_model();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_guru') ? $this->request->getVar('page_guru') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $guru = $this->guru_model->search($keyword);
        } else {
            $guru = $this->guru_model;
        }

        $data = [
            'title' => "Daftar Guru",
            // 'guru' => $this->guru_model->findAll()
            'guru' => $guru->paginate(15, 'guru'),
            'pager' => $this->guru_model->pager,
            'currentPage' => $currentPage
        ];

        return view('guru/index', $data);
    }
}
