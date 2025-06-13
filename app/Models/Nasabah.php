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
        'rekening_nasabah',
        'tanggallahir_nasabah',
        'gender_nasabah',
        'pekerjaan_nasabah',
        'penghasilan_nasabah', // <-- Ganti sesuai nama kolom di migrasi
        'statuskawin_nasabah',
        'tanggungan_nasabah',
        'alamat_nasabah',
        'nohp_nasabah',
        'card_type',
    ];

    protected $casts = [
        'tanggallahir_nasabah' => 'date',
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }

    public function pengajuan_kredit() // <-- Ini adalah fungsi baru untuk relasi Pinjaman
    {
        // Parameter:
        // 1. App\Models\Pinjaman::class: Model target relasi
        // 2. 'id_nasabah': Foreign key di tabel 'pinjaman' yang menunjuk ke 'nasabah'
        // 3. 'id_nasabah': Local key (primary key) di tabel 'nasabah' itu sendiri
        return $this->hasMany(Pengajuan_Kredit::class, 'id_nasabah', 'id_nasabah');
    }
}