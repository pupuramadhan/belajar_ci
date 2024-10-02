<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPendaftaran;

class DataController extends Controller
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new ModelPendaftaran();
    }

    // Menampilkan seluruh data pendaftar
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        // Ambil semua data dari tbl_pendaftaran
        $pendaftars = $this->pendaftaranModel->findAll();

        // Kirim data ke view
        return view('data', ['pendaftars' => $pendaftars]);
    }
}
