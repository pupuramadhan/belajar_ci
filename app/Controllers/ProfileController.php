<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileController extends Controller
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    // Menampilkan seluruh data pendaftar
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login'); // Jika belum login, redirect ke halaman login
        }

        // Ambil data pengguna dari session
        $userData = $this->session->get('userData');

        return view('profile', ['user' => $userData]);
    }
}
