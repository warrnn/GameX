<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'name' => 'Bryan Mogens Warren',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('123123123'),
            'profile_photo_path' => NULL,
        ]);

        Users::create([
            'name' => 'Yestoya Lumenchristo Minggus',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123123123'),
            'profile_photo_path' => NULL,
        ]);

        Users::create([
            'name' => 'Jeconiah Jehian Hartono',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123'),
            'profile_photo_path' => NULL,
        ]);
    }
}
