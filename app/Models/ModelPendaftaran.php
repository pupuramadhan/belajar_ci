<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendaftaran extends Model
{
    protected $table = 'tbl_pendaftaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'agama', 'tempat_lahir', 'tinggi_badan', 'berat_badan', 'nama_hubungan', 'jenis_dokumen', 'nomor_dokumen', 'alamat'];
}
