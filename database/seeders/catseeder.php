<?php

namespace Database\Seeders;

use App\Models\Cat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class catseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Cat::factory()->count(25)->create();
    }
}
