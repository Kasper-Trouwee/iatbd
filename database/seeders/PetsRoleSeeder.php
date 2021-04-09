<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetsRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_array = ["Dog", "Cat", "Bird", "Rodent", "Other"];

        foreach($roles_array as $role){
            DB::table('pets_role')->insert([
                'role' => $role,
            ]);
        }
    }
}
