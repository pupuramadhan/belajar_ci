<?php

namespace App\Controllers;

use App\Models\ModelPengguna;
use CodeIgniter\Controller;
// use App\Models\UserModel;

class LoginController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        helper(['form']);
        $this->userModel = new ModelPengguna();
    }

    // Menampilkan form login
    public function index()
    {
        return view('login');
    }

    // Proses otentikasi
    public function authenticate()
    {
        $validation = \Config\Services::validation();

        // Validasi input form
        $validation->setRules([
            'email'    => 'required|valid_email',
            'password' => 'required'
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return view('login', [
                'validation' => $this->validator,
            ]);
        }

        // Ambil data input dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek pengguna berdasarkan email
        $user = $this->userModel->where('email', $email)->first();

        // Jika pengguna ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password cocok, buat sesi login
                session()->set([
                    'logged_in' => true,
                    'user_id'   => $user['id_pelanggan'],
                    'user_name' => $user['nama_pelanggan'],
                ]);

                // Redirect ke halaman beranda atau dashboard
                return redirect()->to('/data');
            } else {
                // Password salah
                return view('login', ['error' => 'Password salah!']);
            }
        } else {
            // Pengguna tidak ditemukan
            return view('login', ['error' => 'Email tidak terdaftar!']);
        }
    }


    public function logout()
    {
    session()->destroy();
    return redirect()->to('/login');
    }
}
