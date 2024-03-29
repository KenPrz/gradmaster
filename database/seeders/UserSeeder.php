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
        User::create([
            'first_name' => 'Test',
            'last_name'=> 'Student',
            'email' => 'student@gmail.com',
            'user_type_id' => 1, // 'student
            'password'=> bcrypt('test@example.com'),
        ]);
        User::create([
            'first_name'=> 'Test',
            'last_name'=> 'Professor',
            'email'=> 'professor@gmail.com',
            'user_type_id'=> 2,// 'professor'
            'password'=> bcrypt('professor@gmail.com'),
        ]);

        User::factory()->count(10)->create();
    }
}
