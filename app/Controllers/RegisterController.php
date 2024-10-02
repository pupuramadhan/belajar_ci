<?php

namespace App\Controllers;

use App\Models\ModelPengguna;
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
        $this->userModel = new ModelPengguna();
        $validation = \Config\Services::validation();

        // Validasi data input
        $validation->setRules([
            'nama_pelanggan' => 'required',
            'alamat'         => 'required',
            'no_telp'        => 'required|numeric',
            'email'          => 'required|valid_email',
            'tanggal_lahir'  => 'required',
            'jenis_kelamin'  => 'required',
            'kota'           => 'required',
            'provinsi'       => 'required',
            'negara'         => 'required',
            'kode_pos'       => 'required',
            'password'       => 'required|min_length[8]',
            'pass_confirm'   => 'required|matches[password]',
            'komentar'  => 'required',
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
                'no_telp'        => $this->request->getPost('no_telp'),
                'email'          => $this->request->getPost('email'),
                'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'kota'           => $this->request->getPost('kota'),
                'provinsi'       => $this->request->getPost('provinsi'),
                'negara'         => $this->request->getPost('negara'),
                'kode_pos'       => $this->request->getPost('kode_pos'),
                'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash password
                'komentar'       => $this->request->getPost('komentar'),
            ];

            // Simpan data ke database
            $this->userModel->save($data);
            
            return redirect()->to('/register')->with('message', 'Registrasi berhasil!');
        }
    }
}
