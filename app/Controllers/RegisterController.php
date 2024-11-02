<?php

namespace App\Controllers;

use App\Models\ModelPengguna;
use App\Models\ModelUser;
use CodeIgniter\Controller;

class RegisterController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new ModelPengguna();
    }

    public function index()
    {
        return view('register');
    }

    public function submit()
    {
        $this->userModel = new ModelUser();
        $validation = \Config\Services::validation();

        // Validasi data input
        $validation->setRules([


            'nama_pelanggan' => 'required',
            'alamat'         => 'required',
            'kontak'        => 'required|numeric',
            'email'          => 'required|valid_email',
            'username'  => 'required',
            'password'       => 'required|min_length[8]',
            'tanggal_lahir'  => 'required',
            'jenis_kelamin'  => 'required',
            'status'           => 'required',
            'foto_profil'       => 'required',
            'pass_confirm'   => 'required|matches[password]',

        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return view('register_form', [
                'validation' => $this->validator,
            ]);
        } else {
            // Ambil data dari form
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'alamat'         => $this->request->getPost('alamat'),
                'kontak'        => $this->request->getPost('kontak'),
                'email'          => $this->request->getPost('email'),
                'username'          => $this->request->getPost('username'),
                'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password
                'created_at'    => date('Y-m-d H:i:s'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'status'           => $this->request->getPost('status'),
                'foto_profil'       => $this->request->getPost('foto_profil'),
            ];

            // Simpan data ke database
            $this->userModel->save($data);

            return redirect()->to('/register')->with('message', 'Registrasi berhasil!');
        }
    }
}
