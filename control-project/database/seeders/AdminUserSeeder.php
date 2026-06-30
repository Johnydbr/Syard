<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@syard.com.br'],
            [
                'name'     => 'Administrador',
                'email'    => 'admin@syard.com.br',
                'password' => Hash::make('syard@2026'),
                'role'     => 'admin',
            ]
        );
    }
}
