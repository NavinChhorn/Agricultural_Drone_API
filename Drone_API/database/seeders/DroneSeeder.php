<?php

namespace Database\Seeders;

use App\Models\Drone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drones=[
            [
                "type"=>"SPRAY",
                "bettery"=>"42000",
                "plan_id"=>1,
                "instruction_id"=>1,
                "location_id"=>1,
            ],
            [
                "type"=>"MAPPING",
                "bettery"=>"20000",
                "plan_id"=>2,
                "instruction_id"=>2,
                "location_id"=>2,
            ],
            [
                "type"=>"SPRAY",
                "bettery"=>"50000",
                "plan_id"=>3,
                "instruction_id"=>3,
                "location_id"=>3,
            ]
        ];
        foreach($drones as $drone){
            Drone::create($drone);
        }
    }
}
