<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farms=[
            [
                "name"=>"Apple Farm",
                "province_id"=>1
            ],
            [
                "name"=>"Orange Farm",
                "province_id"=>1
            ],
            [
                "name"=>"Rice Farm",
                "province_id"=>1
            ],
        ];
        foreach($farms as $farm){
            Farm::create($farm);
        }
    }
}
