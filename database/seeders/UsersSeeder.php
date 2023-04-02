<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();

        // テストユーザー
        User::create([
            'name' => 'shop-admin1',
            'email' => 'shop-admin1@email.com',
            'email_verified_at' => now(),
            'password' =>
            Hash::make('password123'),
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'shop-admin2',
            'email' => 'shop-admin2@email.com',
            'email_verified_at' => now(),
            'password' =>
            Hash::make('password123'),
            'role_id' => 2,
            'remember_token' => Str::random(10),
        ]);
    }
}
