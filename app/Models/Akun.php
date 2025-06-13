<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Akun extends Authenticatable
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    // Karena nama tabel Anda 'akun' (tunggal), Eloquent akan secara otomatis
    // menganggapnya 'akun' tanpa perlu properti $table.
    // Namun, untuk eksplisit dan menghindari kebingungan, Anda bisa menuliskannya.
    protected $table = 'akun';

    // Kolom kunci utama (primary key)
    // Laravel secara default mencari 'id'. Karena Anda menggunakan 'id_akun',
    // Anda perlu menentukannya secara eksplisit.
    protected $primaryKey = 'id_akun';

    // Laravel secara default menganggap primary key adalah auto-incrementing.
    // Jika 'id_akun' Anda bukan auto-incrementing (misalnya, Anda mengisinya manual),
    // Anda perlu set public $incrementing = false;
    // public $incrementing = false; // Uncomment jika id_akun bukan auto-increment

    // Tipe data primary key (defaultnya int).
    // Jika id_akun Anda adalah string atau UUID, Anda perlu menentukannya.
    // protected $keyType = 'string'; // Uncomment jika id_akun adalah string/UUID

    // Menonaktifkan timestamps (created_at dan updated_at)
    // Jika tabel 'akun' Anda tidak memiliki kolom 'created_at' dan 'updated_at',
    // Anda harus mengatur properti $timestamps menjadi false.
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email_akun',
        'username_akun',
        'password_akun',
        'jenis_akun', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_akun', // Penting: sembunyikan password saat di-JSON
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Jika ada kolom yang perlu di-cast ke tipe data tertentu, tambahkan di sini.
        // Contoh: 'email_akun_verified_at' => 'datetime',
        // 'is_active' => 'boolean',
    ];

    public function getAuthIdentifierName()
    {
        return $this->email_akun;
    }

    public function getAuthPassword()
    {
        return $this->password_akun;
    }

    public function nasabah(){
        return $this->hasOne(Nasabah::class, 'id_akun', 'id_akun');
    }
}