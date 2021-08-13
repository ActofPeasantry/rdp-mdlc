<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Administrator',
            'user_id' => 1,
            'birthplace' => 'Padang',
            'phone' => '12343567890',
            'address' => 'address',
        ]);
    }
}
