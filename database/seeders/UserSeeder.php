<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'webdev587',
            'email' => 'webdev587@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('webdev587'),
            'remember_token' => Str::random(10),
            'sex' => 'M'
        ]);

        User::create([
            'username' => 'mr_izu',
            'email' => 'wdev587@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('$wdev587'),
            'remember_token' => Str::random(10),
            'sex' => 'M'
        ]);
    }
}
