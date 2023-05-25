<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructions=[
            [
                "speed"=>100,
                "altitude"=>"100m"
            ],
            [
                "speed"=>200,
                "altitude"=>"200m"
            ],
            [
                "speed"=>300,
                "altitude"=>"300m"
            ],
        ];
        foreach($instructions as $instruction){
            Instruction::create($instruction);
        }
    }
}
