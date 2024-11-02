<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $allowedFields = ['nama_produk', 'deskripsi_produk', 'harga', 'created_at', 'stok', 'gambar_produk', 'status', 'berat', 'ukuran'];
}
