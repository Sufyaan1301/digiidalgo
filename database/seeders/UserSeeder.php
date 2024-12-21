<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    
    private $data = 
    [
        [
            "name"=>"Jono Sunandar",
            "email"=>"jonosunandar@gmail.com",
            
        ]
    ];
    public function run(): void
    {
        //
        foreach($this->data as $d)
        {
            $d["password"] = bcrypt("admin1234");
            User::create($d);
        }
        
    }
}
