<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan_Kredit extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_kredit';
    protected $primaryKey = 'id_pengajuan_kredit';
    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan_kredit',
        'id_komite',
        'id_nasabah',
        'tanggal_pengajuankredit',
        'nominal_pengajuankredit',
        'kategori_pengajuankredit',
        'status_pengajuankredit',
        'konfirmasi_pengajuankredit',
        'tenor',
        'status_kelayakan',
        'rekening_nasabah'
    ];

    protected $casts = [
        'tanggal_pengajuankredit' => 'date',
    ];
}
