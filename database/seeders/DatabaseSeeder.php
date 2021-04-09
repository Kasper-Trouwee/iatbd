<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            AdminSeeder::class,
            PetownerTableSeeder::class,
            SitterTableSeeder::class,
            PetsRoleSeeder::class,
            BirdsTableSeeder::class,
            CatsTableSeeder::class,
            DogsTableSeeder::class,
            RodentsTableSeeder::class,
        ]);
    }
}
