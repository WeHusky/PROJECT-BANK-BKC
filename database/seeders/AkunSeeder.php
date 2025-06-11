<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Akun::create([
            'username_akun' => 'Admin',
            'email_akun' => 'admin@bkcbank.com',
            'password_akun' => Hash::make('admin'), // jangan sembarangan passworddigan
            'jenis_akun' => 'Admin',
        ]);
    }
}
