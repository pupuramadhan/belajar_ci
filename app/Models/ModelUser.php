<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['nama_pelanggan', 'alamat', 'kontak', 'email', 'username', 'password', 'created_at', 'tanggal_lahir', 'jenis_kelamin', 'status', 'foto_profil'];
    protected $useTimestamps = true;
}
