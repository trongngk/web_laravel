<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "username" => "Teacher",
            "password" => "123",
            'fullname' => "Teacher",
            "email" => "teacher@gmail.com",
            "phone" => "0123456789",            
            'role' => 1
        ];

        Data::create($data);
        $data = [
            "username" => "Student",
            "password" => "123",
            'fullname' => "Student",
            "email" => "student@gmail.com",
            "phone" => "0123456789",            
            'role' => 0
        ];

        Data::create($data);
    }
}
