<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'title' => 'Monsieur',
            'firstName' => 'Abdoulaye',
            'lastName' => 'Youm',
            'email' => 'abdoulaye.youm@expat-dakar.com',
            'password' => Hash::make('admin1234'),
            'phone_number' => '+221 77 546 77 89',
            'position' => 'RH',
        ]);
    }
}
