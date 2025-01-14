<?php

namespace Database\Seeders;

use App\Models\Admins;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admins::create([
            'user_id' => Users::where('email', 'admin@gmail.com')->first()->id
        ]);
    }
}
