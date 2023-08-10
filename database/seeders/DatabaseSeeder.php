<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Abdul Othman',
             'email' => 'gazixq@gmail.com',
             'password' => bcrypt('123456'),
             'email_verified_at' => now(),
             'remember_token' => Str::random(10),
         ]);
    }
}
