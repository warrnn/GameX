<?php

namespace Database\Seeders;

use App\Models\Sellers;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sellers::create([
            'domicile' => 'Malang',
            'address' => 'Jl. Raya Malang',
            'phone' => '08123456789',
            'user_id' => Users::where('email', 'seller@gmail.com')->first()->id
        ]);
    }
}
