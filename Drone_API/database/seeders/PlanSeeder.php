<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans=[
            [
                'name'=>'Order1',
                'type'=>'SPAY',
                'datetime'=>'2023-06-10 23:59:59',
                'area'=>'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)',
                'density'=>299,
                "farm_id"=>1,
                "user_id"=>1
            ],
            [
                'name'=>'Order2',
                'type'=>'MAPPING',
                'datetime'=>'2023-06-10 23:59:59',
                'area'=>'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)',
                'density'=>300,
                "farm_id"=>2,
                "user_id"=>1
            ],
            [
                'name'=>'Order3',
                'type'=>'SPAY',
                'datetime'=>'2023-06-10 23:59:59',
                'area'=>'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)',
                'density'=>400,
                "farm_id"=>1,
                "user_id"=>1
            ],
        ];
        foreach($plans as $plan){
            Plan::create($plan);
        }
    }
}
