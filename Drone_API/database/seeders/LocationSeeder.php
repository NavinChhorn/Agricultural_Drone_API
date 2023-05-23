<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations=[
            [
                "latitude"=>12121.222,
                "longitude"=>12133.222,
            ],
            [
                "latitude"=>34566.222,
                "longitude"=>1234.222,
            ],
            [
                "latitude"=>3456.222,
                "longitude"=>2223.222,
            ],
        ];
        foreach($locations as $location){
            Location::create($location);
        }
    }
}
