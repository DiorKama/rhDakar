<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();
         User::factory()
                ->count(25)
                ->state(new Sequence(
                    fn (Sequence $sequence) => ['manager_id' => User::all()->take(5)->random()],
                ))
                ->create();
    }
}
