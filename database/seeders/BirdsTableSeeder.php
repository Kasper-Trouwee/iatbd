<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class BirdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets_array = ["Greg", "Miku", "Lara", "Meg", "Andre"];

        foreach($pets_array as $pet){
            DB::table('pets')->insert([
                'name' => $pet,
                'kind' => "Bird",
                'age' => 3,
                'description' => "Placeholder description for birds.",
                'price' => 2.50,
                'startDate' => Carbon::parse('2021-01-01'),
                'endDate' => Carbon::parse('2021-01-07'),
                'image' => "/image/bird.jpg",
                'ownerid' => 2,
            ]);
        }
    }
}
