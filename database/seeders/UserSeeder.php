<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '37066666666',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        // for ($i = 0; $i < 50; $i++) {
        //     User::create([
        //         'name' => fake()->firstName(),
        //         'last_name' => fake()->lastName(),
        //         'email' => fake()->unique()->safeEmail(),
        //         'phone' => fake()->unique()->phoneNumber(),
        //         'password' => Hash::make('password'),
        //         'email_verified_at' => now(),
        //         'remember_token' => Str::random(10),
        //     ]);
        // }
    }
}
