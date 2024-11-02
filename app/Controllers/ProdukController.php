<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProdukModel;

class produkController extends Controller
{
    protected $ProdukModel;
    protected $session;

    public function __construct()
    {
        $this->session = session();
        $this->ProdukModel = new ProdukModel();
    }

    // Menampilkan seluruh data pendaftar
    public function index()
    {
        // Ambil semua data dari tbl_pendaftaran
        $produks = $this->ProdukModel->findAll();

        if (!session()->get('IsLoggedIn')) {
            return view('produk', ['produks' => $produks]);
        }
        // Kirim data ke view
        return view('data', ['produks' => $produks]);
    }

    public function add_produk()

    {
        return view('add_produk');
    }


    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([

            'nama_produk'           => 'required',
            'deskripsi_produk'      => 'required',
            'harga'                 => 'required',
            'created_at'            => 'required',
            'stok'                  => 'required',
            'gambar_produk'         => 'required',
            'status'                => 'required',
            'berat'                 => 'required',
            'ukuran'                => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('add_produk', ['validation' => $validation]);
        }

        // Simpan data ke database
        $this->ProdukModel->save([
            'nama_produk'          => $this->request->getPost('nama_produk'),
            'deskripsi_produk'         => $this->request->getPost('deskripsi_produk'),
            'harga'  => $this->request->getPost('harga'),
            'created_at'  => $this->request->getPost('created_at'),
            'stok'   => $this->request->getPost('stok'),
            'gambar_produk' => $this->request->getPost('gambar_produk'),
            'status' => $this->request->getPost('status'),
            'berat' => $this->request->getPost('berat'),
            'ukuran'        => $this->request->getPost('ukuran'),
        ]);

        return redirect()->to('/produk')->with('success', 'Pendaftaran berhasil');
    }

    public function search()
    {
        $search = $this->request->getPost('search');
        $produks = $this->ProdukModel->like('nama_produk', $search)->findAll();
        return view('produk', ['produks' => $produks, 'search' => $search]);
    }

    public function edit($id)
    {
        $produk = $this->ProdukModel->find($id);
        if (!$produk) {
            return redirect()->to('/produk')->with('error', 'Produk tidak ditemukan');
        }

        return view('edit_produk', ['produk' => $produk]);
    }


    public function update($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_produk'           => 'required',
            'deskripsi_produk'      => 'required',
            'harga'                 => 'required',
            'stok'                  => 'required',
            'gambar_produk'         => 'required',
            'status'                => 'required',
            'berat'                 => 'required',
            'ukuran'                => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan kembali form edit
            return view('edit_produk', [
                'produk' => $this->ProdukModel->find($id),
                'validation' => $validation
            ]);
        }

        // Simpan data ke database
        $this->ProdukModel->update($id, [
            'nama_produk'          => $this->request->getPost('nama_produk'),
            'deskripsi_produk'     => $this->request->getPost('deskripsi_produk'),
            'harga'                => $this->request->getPost('harga'),
            'stok'                 => $this->request->getPost('stok'),
            'gambar_produk'        => $this->request->getPost('gambar_produk'),
            'status'               => $this->request->getPost('status'),
            'berat'                => $this->request->getPost('berat'),
            'ukuran'               => $this->request->getPost('ukuran'),
        ]);

        return redirect()->to('/produk')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        if ($this->ProdukModel->delete($id)) {
            return redirect()->to('/produk')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/produk')->with('error', 'Gagal menghapus data');
        }
    }
}
