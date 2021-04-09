<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class SitterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kasper Sitter',
            'email' => 'kaspersitter@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Sitter',
        ]);

        DB::table('users')->insert([
            'name' => 'Mike',
            'email' => 'mike@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Sitter',
        ]);

        DB::table('users')->insert([
            'name' => 'Fred',
            'email' => 'fred@gmail.com',
            'password' => Hash::make('laravel'),
            'role' => 'Sitter',
        ]);
    }
}
