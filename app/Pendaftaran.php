<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = 
    ['nama_pendaftard','tgl_lahir','no_hp',
    'jenjang_sekolah', 'jenis_kelas', 'alamat_rumah',
    'nama_ortu', 'no_rekening', 'atas_nama',
    'bukti_transfer', 'status'
    ];
}