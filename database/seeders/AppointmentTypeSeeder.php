<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        AppointmentType::factory()->count(5)->create();
    }
}
