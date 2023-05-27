<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name'=>'visal',
                'email'=>'sal@gmail.com',
                'password'=>'12345'
            ],
            [
                'name'=>'navin',
                'email'=>'navin@gmail.com',
                'password'=>'12345'
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
