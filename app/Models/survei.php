<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survei extends Model
{
    use HasFactory;

    protected $table = 'survei';
    protected $primaryKey = 'id_survei';
    public $timestamps = false;

    protected $fillable = [
        'id_survei',
        'id_komite',
        'id_nasabah',
        'tanggal_survei',
        'alasan_peminjaman',
        'kondisi_rumah',
        'kondisi_ekonomi',
    ];

    protected $casts = [
        'tanggal_survei' => 'date',
    ];
}
