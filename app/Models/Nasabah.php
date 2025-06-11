<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah'; // <-- Pastikan ini 'nasabah' (huruf kecil semua)
    protected $primaryKey = 'id_nasabah';
    public $timestamps = false; // Jika tidak ada created_at/updated_at di tabel nasabah

    protected $fillable = [
        'id_akun',
        'nik_nasabah',
        'nama_nasabah',
        'tanggallahir_nasabah',
        'gender_nasabah',
        'pekerjaan_nasabah',
        'penghasilan_nasabah', // <-- Ganti sesuai nama kolom di migrasi
        'statuskawin_nasabah',
        'tanggungan_nasabah',
        'alamat_nasabah',
        'nohp_nasabah',
    ];

    protected $casts = [
        'tanggallahir_nasabah' => 'date',
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }
}