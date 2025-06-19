<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $primaryKey = 'id_notifikasi';
    public $timestamps = true;

    protected $fillable = [
        'jenis_notifikasi',
        'deskripsi_notifikasi',
        'link_notifikasi',
        'id_akun',
        'status_notifikasi',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getFormattedTimestampAttribute()
    {
        $created = Carbon::parse($this->created_at);
        $now = Carbon::now();

        if ($created->isSameDay($now)) {
            return $created->format('H:i'); // Format: 14:30
        }
        return $created->format('d/m/Y'); // Format: 17 Jun 2025
    }
    
    public function getTruncatedPesanAttribute()
    {
        return Str::limit($this->deskripsi_notifikasi, 50, '...'); // Batasi 150 karakter, tambahkan '...'
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'id_akun', 'id_akun');
    }
    
}
