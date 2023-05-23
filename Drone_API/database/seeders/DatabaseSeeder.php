<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // To run seeder ============
        $this->call(LocationSeeder::class);
        $this->call(DroneSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(FarmSeeder::class);
        $this->call(MapSeeder::class);
    }
}
