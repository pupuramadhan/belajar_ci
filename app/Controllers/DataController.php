<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPendaftaran;

class DataController extends Controller
{
    protected $pendaftaranModel;
    protected $session;

    public function __construct()
    {
        $this->session = session();
        $this->pendaftaranModel = new ModelPendaftaran();
    }

    // Menampilkan seluruh data pendaftar
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        // Ambil semua data dari tbl_pendaftaran
        $pendaftars = $this->pendaftaranModel->findAll();

        // Kirim data ke view
        return view('data', ['pendaftars' => $pendaftars]);
    }
}
