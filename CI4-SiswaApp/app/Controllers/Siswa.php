<?php

namespace App\Controllers;

use App\Models\Siswa_model;

class Siswa extends BaseController
{
    protected $siswa_model;

    public function __construct()
    {
        $this->siswa_model = new Siswa_model();
    }

    public function index()
    {
        $data = [
            'title' => "Daftar Siswa",
            'siswa' => $this->siswa_model->getSiswa()
        ];

        return view('siswa/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => "Daftar Siswa",
            'siswa' => $this->siswa_model->getSiswa($id)
        ];

        if (empty($data['siswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Siswa Tidak Ditemukan!!');
        }

        return view('siswa/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => "Tambah Data Siswa",
            'validation' => \Config\Services::validation()
        ];

        return view('siswa/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'nis' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'email' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/siswa/create')->withInput(); //->with('validation', $validation);
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $fotoName = 'default.png';
        } else {
            $fotoName = $foto->getRandomName();
            $foto->move('img', $fotoName);
        }

        $this->siswa_model->save([
            'foto' => $fotoName,
            'nama' => $this->request->getVar('nama'),
            'nis' => $this->request->getVar('nis'),
            'telepon' => $this->request->getVar('telepon'),
            'jurusan' => $this->request->getVar('jurusan'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/siswa');
    }

    public function delete($id)
    {
        $siswa = $this->siswa_model->find($id);
        if ($siswa['foto'] != 'default.png') {
            unlink('img/' . $siswa['foto']);
        }

        $this->siswa_model->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');

        return redirect()->to('/siswa');
    }

    public function update($id)
    {
        $data = [
            'title' => "Edit Data Siswa",
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswa_model->getSiswa($id)
        ];

        return view('siswa/update', $data);
    }

    public function saveUpdate($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'nis' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'email' => [
                'rules' => 'required',
                'errors' => ['required' => 'Data {field} harus di isi.']
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/siswa/update/' . $id)->withInput();
        }

        $foto = $this->request->getFile('foto');

        if ($foto->getError() == 4) {
            $fotoName = $this->request->getVar('fotoLama');;
        } else {
            $fotoName = $foto->getRandomName();
            $foto->move('img', $fotoName);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $this->siswa_model->save([
            'id' => $id,
            'foto' => $fotoName,
            'nama' => $this->request->getVar('nama'),
            'nis' => $this->request->getVar('nis'),
            'telepon' => $this->request->getVar('telepon'),
            'jurusan' => $this->request->getVar('jurusan'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit');

        return redirect()->to('/siswa');
    }
}
