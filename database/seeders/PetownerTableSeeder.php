<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class PetownerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kasper Pet Owner',
            'email' => 'kasperpetowner@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Pet owner',
        ]);

        DB::table('users')->insert([
            'name' => 'James',
            'email' => 'james@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Pet owner',
        ]);

        DB::table('users')->insert([
            'name' => 'Martin',
            'email' => 'martin@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Pet owner',
        ]);
    }
}
