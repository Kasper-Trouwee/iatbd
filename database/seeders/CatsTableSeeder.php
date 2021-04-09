<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pets_array = ["Garfield", "Jeff", "Jane", "Carl", "Cassie"];

        foreach($pets_array as $pet){
            DB::table('pets')->insert([
                'name' => $pet,
                'kind' => "Cat",
                'age' => 4,
                'description' => "Placeholder description for cats.",
                'price' => 4.50,
                'startDate' => Carbon::parse('2021-01-01'),
                'endDate' => Carbon::parse('2021-01-07'),
                'image' => "/image/cat.jpg",
                'ownerid' => 2,
            ]);
        }
    }
}
