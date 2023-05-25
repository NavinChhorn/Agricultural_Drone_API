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
                "battery"=>"42000mAh",
                "plan_id"=>1,
                "instruction_id"=>1,
                "location_id"=>1,
            ],
            [
                "type"=>"MAPPING",
                "battery"=>"20000mAh",
                "plan_id"=>2,
                "instruction_id"=>2,
                "location_id"=>2,
            ],
            [
                "type"=>"SPRAY",
                "battery"=>"50000mAh",
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
