<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TransaksiModel;
use Config\App;

class TransaksiController extends Controller
{
    protected $TransaksiModel;
    protected $session;

    public function __construct()
    {
        $this->session = session();
        $this->TransaksiModel = new TransaksiModel();
    }

    // Menampilkan seluruh data pendaftar
    public function index()
    {
        // Ambil semua data dari tabel transaksi
        $transaksis = $this->TransaksiModel->findAll();

        // Tambahkan nama supplier dan nama pelanggan untuk setiap transaksi
        foreach ($transaksis as &$transaksi) {
            $transaksi['nama_produk'] = $this->TransaksiModel->getNamaProduk($transaksi['produk_id']);
            $transaksi['nama_pelanggan'] = $this->TransaksiModel->getNamaUser($transaksi['user_id']);
        }

        // Cek status login
        if (!session()->get('IsLoggedIn')) {
            return view('transaksi', ['transaksis' => $transaksis]);
        }

        // Kirim data ke view
        return view('transaksi', ['transaksis' => $transaksis]);
    }



    public function add_transaksi()

    {
        $supplierModel = new \App\Models\ProdukModel();
        $penggunaModel = new \App\Models\ModelUser();

        // Ambil data supplier dari tabel supplier
        $produks = $supplierModel->findAll();
        $users = $penggunaModel->findAll();

        return view('add_transaksi', ['produks' => $produks, 'users' => $users]);
    }


    public function store()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([

            'produk_id'           => 'required',
            'user_id'      => 'required',
            'tanggal_transaksi'                 => 'required',
            'jumlah'            => 'required',
            'total_harga'                  => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('add_transaksi', ['validation' => $validation]);
        }

        // Simpan data ke database
        $this->TransaksiModel->save([
            'produk_id'          => $this->request->getPost('produk_id'),
            'user_id'         => $this->request->getPost('user_id'),
            'tanggal_transaksi'  => $this->request->getPost('tanggal_transaksi'),
            'jumlah'  => $this->request->getPost('jumlah'),
            'total_harga'   => $this->request->getPost('total_harga'),
        ]);


        return redirect()->to('/transaksi')->with('success', 'Pendaftaran berhasil');
    }

    public function search()
    {
        $search = $this->request->getPost('search');
        $transaksis = $this->TransaksiModel->like('transaksi_id', $search)->findAll();
        return view('transaksi', ['$transaksis' => $transaksis, 'search' => $search]);
    }

    public function edit($transaksi_id)
    {
        $transaksiModel = new \App\Models\TransaksiModel();
        $supplierModel = new \App\Models\ProdukModel(); // Ganti dengan model yang sesuai
        $penggunaModel = new \App\Models\ModelUser();

        // Ambil data transaksi berdasarkan ID
        $transaksi = $transaksiModel->find($transaksi_id);

        // Jika transaksi tidak ditemukan, redirect atau tampilkan error
        if (!$transaksi) {
            return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan');
        }

        // Ambil data supplier dan pengguna
        $produks = $supplierModel->findAll();
        $users = $penggunaModel->findAll();

        return view('edit_transaksi', [
            'transaksi' => $transaksi,
            'produks' => $produks,
            'users' => $users,
        ]);
    }

    public function update($transaksi_id)
    {
        $transaksiModel = new \App\Models\TransaksiModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'produk_id' => 'required',
            'user_id' => 'required',
            'tanggal_transaksi' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/transaksi/edit/' . $transaksi_id)->withInput()->with('validation', $validation);
        }

        // Update data ke database
        $transaksiModel->update($transaksi_id, [
            'produk_id' => $this->request->getPost('produk_id'),
            'user_id' => $this->request->getPost('user_id'),
            'tanggal_transaksi' => $this->request->getPost('tanggal_transaksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'total_harga' => $this->request->getPost('total_harga'),
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil diupdate');
    }


    public function delete($id)
    {
        if ($this->TransaksiModel->delete($id)) {
            return redirect()->to('/transaksi')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('/transaksi')->with('error', 'Gagal menghapus data');
        }
    }
}
