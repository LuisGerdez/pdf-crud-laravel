<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        // create a user
        DB::table('users')->insert([
            'name' => 'user_test',
            'email' => 'user_test@gmail.com',
            'password' => Hash::make('password'), // password
        ]);
    }
}
