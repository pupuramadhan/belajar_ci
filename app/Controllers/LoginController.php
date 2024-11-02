<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\Controller;
// use App\Models\UserModel;

class LoginController extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        helper(['form']);
        $this->userModel = new ModelUser();
        $this->session = \Config\Services::session();
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

        $session = session();
        // Ambil data input dari form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek pengguna berdasarkan email
        $user = $this->userModel->where('email', $email)->first();

        // Jika pengguna ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Jika password benar, simpan data pengguna di session
                $this->session->set('isLoggedIn', true);
                $this->session->set('userData', [
                    'id' => $user['user_id'],
                    'nama' => $user['nama_pelanggan'],
                    'jenis_kelamin' => $user['jenis_kelamin'],
                    'email' => $user['email'],
                    'tanggal_lahir' => $user['tanggal_lahir'],
                    'alamat' => $user['alamat'],
                ]);

                return redirect()->to('/profile'); // Arahkan ke ProfileController
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
