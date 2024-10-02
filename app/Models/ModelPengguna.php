<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama_pelanggan', 'alamat', 'no_telp', 'email', 'tanggal_lahir', 'jenis_kelamin', 'kota', 'provinsi', 'negara', 'kode_pos', 'password', 'komentar'];
    protected $useTimestamps = true;
}
