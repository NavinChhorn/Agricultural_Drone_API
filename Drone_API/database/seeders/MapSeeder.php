<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maps=[
            [
                "image_name"=>"farm1.png",
                "height"=> 200,
                "width"=> 150,
                "drone_id"=>1,
                "farm_id"=>1,
            ],
            [
                "image_name"=>"farm2.png",
                "height"=> 200,
                "width"=> 150,
                "drone_id"=>1,
                "farm_id"=>2,
            ],
        ];
        foreach($maps as $map){
            Map::create($map);
        }
    }
}
