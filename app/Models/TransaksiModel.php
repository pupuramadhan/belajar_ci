<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $allowedFields = ['transaksi_id', 'produk_id', 'user_id', 'tanggal_transaksi', 'jumlah', 'total_harga'];

    // Method to get produk name
    public function getNamaProduk($produkId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('produk'); // Pastikan 'produk' adalah nama tabel yang benar
        $builder->select('nama_produk'); // Pastikan 'nama_produk' adalah kolom untuk nama produk
        $builder->where('produk_id', $produkId);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->nama_produk;
        }

        return null;
    }

    // Method to get customer name
    public function getNamaUser($customerId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('user'); // Pastikan 'user' adalah nama tabel yang benar
        $builder->select('nama_pelanggan'); // Pastikan 'nama_user' adalah kolom untuk nama pelanggan
        $builder->where('user_id', $customerId); // Gantilah 'id' dengan primary key tabel 'user' yang sesuai
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->nama_pelanggan;
        }

        return null;
    }

    public function search($search)
    {
        return $this->table($this->table)
            ->join('produk', 'transaksi.produk_id = produk.produk_id', 'left')
            ->join('user', 'transaksi.user_id = user.user_id', 'left')
            ->groupStart()
            ->like('transaksi.transaksi_id', $search)
            ->groupEnd()
            ->findAll();
    }
}
