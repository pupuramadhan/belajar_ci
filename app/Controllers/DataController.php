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
        // Ambil semua data dari tbl_pendaftaran
        $pendaftars = $this->pendaftaranModel->findAll();

        if (!session()->get('IsLoggedIn')) {
            return view('data', ['pendaftars' => $pendaftars]);
        }
        // Kirim data ke view
        return view('data', ['pendaftars' => $pendaftars]);
    }
}
