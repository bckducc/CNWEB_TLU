<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Luffy',
            'email' => 'luffy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'bio' => 'Hello, I am Luffy.',
            'avatar' => 'avatars/luffy.jpg', 
        ]);
    }
}
