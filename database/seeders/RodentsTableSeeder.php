<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class RodentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets_array = ["George", "Tommy", "Sara", "Luffy", "Fluff"];

        foreach($pets_array as $pet){
            DB::table('pets')->insert([
                'name' => $pet,
                'kind' => "Rodent",
                'age' => 1,
                'description' => "Placeholder description for rodents.",
                'price' => 1.50,
                'startDate' => Carbon::parse('2021-01-01'),
                'endDate' => Carbon::parse('2021-01-07'),
                'image' => "/image/rodent.jpg",
                'ownerid' => 4,
            ]);
        }
    }
}
