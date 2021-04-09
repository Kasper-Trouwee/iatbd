<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DogsTableSeeder extends Seeder
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
                'kind' => "Dog",
                'age' => 5,
                'description' => "Placeholder description for dogs.",
                'price' => 6.50,
                'startDate' => Carbon::parse('2021-01-01'),
                'endDate' => Carbon::parse('2021-01-07'),
                'image' => "/image/dog.jpg",
                'ownerid' => 3,
            ]);
        }
    }
}
