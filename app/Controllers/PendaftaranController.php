<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPendaftaran;

class PendaftaranController extends Controller
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new ModelPendaftaran();
        helper(['form', 'url']);
    }

    // Menampilkan form pendaftaran
    public function index()
    {
        return view('pendaftaran');
    }

    // Menyimpan data pendaftar
    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'          => 'required',
            'agama'         => 'required',
            'tempat_lahir'  => 'required',
            'tinggi_badan'  => 'required',
            'berat_badan'   => 'required',
            'nama_hubungan' => 'required',
            'jenis_dokumen' => 'required',
            'nomor_dokumen' => 'required',
            'alamat'        => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('pendaftaran', ['validation' => $validation]);
        }

        // Simpan data ke database
        $this->pendaftaranModel->save([
            'nama'          => $this->request->getPost('nama'),
            'agama'         => $this->request->getPost('agama'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tinggi_badan'  => $this->request->getPost('tinggi_badan'),
            'berat_badan'   => $this->request->getPost('berat_badan'),
            'nama_hubungan' => $this->request->getPost('nama_hubungan'),
            'jenis_dokumen' => $this->request->getPost('jenis_dokumen'),
            'nomor_dokumen' => $this->request->getPost('nomor_dokumen'),
            'alamat'        => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/pendaftaran')->with('success', 'Pendaftaran berhasil');
    }

    public function search()
    {
        $search = $this->request->getPost('search');
        $pendaftars = $this->pendaftaranModel->like('nama', $search)->findAll();
        return view('data', ['pendaftars' => $pendaftars, 'search' => $search]);
    }

    public function delete($id)
    {
        $this->pendaftaranModel->delete($id);
        return redirect()->to('/data')->with('success', 'Data berhasil dihapus');
    }
}
